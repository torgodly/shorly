<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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

        Builder::macro('perWeek', function () {
            return $this->select(DB::raw("DATE(created_at) as date"), DB::raw('YEAR(created_at) year, WEEK(created_at) week'), DB::raw('count(*) as views'))
                ->groupby('year', 'week')
                ->get();
        });

        Builder::macro('perMonth', function () {
            return $this->select(DB::raw("DATE(created_at) as date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*)  as views'))
                ->groupby('year', 'month')
                ->get();
        });

        Builder::macro('perYear', function () {
            return $this->select(DB::raw("DATE(created_at) as date"), DB::raw('YEAR(created_at) year'), DB::raw('count(*)  as views'))
                ->groupby('year')
                ->get();
        });

        Collection::macro('between', function ($start = null, $end = null) {
            $start = $start ?? Carbon::now()->startOfWeek();
            $end = $end ?? Carbon::now()->endOfWeek();
            return $this->whereBetween('date', [$start, $end]);
        });

        Builder::macro('today', function () {
            return $this->whereDate('created_at', Carbon::today());
        });


    }
}
