<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('perDay', function () {
            return $this->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*)  as views'))
                ->groupBy('date')
                ->get();
        });

        Builder::macro('perMonth', function () {
            return $this->select(DB::raw("DATE(created_at) as date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month') , DB::raw('count(*)  as views'))
                ->groupby('year','month')
                ->get();
        });

        Builder::macro('perYear', function () {
            return $this->select(DB::raw("DATE(created_at) as date"),  DB::raw('YEAR(created_at) year'), DB::raw('count(*)  as views'))
                ->groupby('year')
                ->get();
        });

        Collection::macro('thisWeek', function () {
            return $this->whereBetween('date',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            );
        });
        Collection::macro('thisMonth', function () {
            return $this->whereBetween('date',
                [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
            );
        });

        Collection::macro('thisYear', function () {
            return $this->whereBetween('date',
                [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]
            );
        });


    }
}
