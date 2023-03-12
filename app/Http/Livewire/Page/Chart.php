<?php

namespace App\Http\Livewire\Page;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chart extends Component
{
    public $visitors;
    public $start_date;
    public $end_date;

    public $dates = [];
    public $views = [];

    public function mount()
    {

        $this->visitors = Auth::user()->visitLogs()->perDay()->thisYear();


        foreach ($this->visitors as $visitor) {

            $this->dates[] = Carbon::parse($visitor->date)->format('l');
            $this->views[] = $visitor->views;

        }


    }

    public function render()
    {


        return view('livewire.page.chart');
    }


    public function Week()
    {
        $this->dates = null;
        $this->views = null;
        $this->visitors = Auth::user()->visitLogs()->perDay()->thisWeek();
        foreach ($this->visitors as $visitor) {

            $this->dates[] = Carbon::parse($visitor->date)->format('l');
            $this->views[] = $visitor->views;

        }

        $this->dispatchBrowserEvent('chart-updated', ['views' => $this->views, 'dates' => $this->dates]);

    }

    public function Month()
    {
        $this->dates = null;
        $this->views = null;
        $this->visitors = Auth::user()->visitLogs()->perDay()->thisMonth();
        foreach ($this->visitors as $visitor) {

            $this->dates[] = Carbon::parse($visitor->date)->format('l F');
            $this->views[] = $visitor->views;

        }

        $this->dispatchBrowserEvent('chart-updated', ['views' => $this->views, 'dates' => $this->dates]);


    }

    public function Year()
    {
        $this->dates = null;
        $this->views = null;
        $this->visitors = Auth::user()->visitLogs()->perDay()->thisYear();
        foreach ($this->visitors as $visitor) {

            $this->dates[] = Carbon::parse($visitor->date)->format('l F Y');
            $this->views[] = $visitor->views;

        }

        $this->dispatchBrowserEvent('chart-updated', ['views' => $this->views, 'dates' => $this->dates]);

    }
}
