<?php

namespace App\Http\Livewire\Page;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Chart extends Component
{
    public $visitors;
    public $startDate;
    public $endDate;

    public $dates = [];
    public $views = [];

    public $scope = 'perDay';
    public $total;


    public function __construct()
    {
        parent::__construct();
        $this->startDate = Carbon::now()->startOfWeek()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfWeek()->format('Y-m-d');
    }

    public function mount()
    {
        $this->updateData();
    }

    public function render()
    {
        return view('livewire.page.chart');
    }

    public function updatedscope()
    {
        $this->updateData();
    }

    public function updatedstartDate()
    {
        $this->updateData();
    }

    public function updatedendDate()
    {
        $this->updateData();
    }

    public function updateData()
    {
        $this->dates = null;
        $this->views = null;

        $this->visitors = Auth::user()->visitLogs()->{$this->scope}()->between($this->startDate, $this->endDate);
        foreach ($this->visitors as $visitor) {
            switch($this->scope) {
                case 'perDay':
                    $this->dates[] = Carbon::parse($visitor->date)->format('l');
                    break;
                case 'perWeek':
                    $this->dates[] = 'Week ' . Carbon::parse($visitor->date)->format('W') . ', ' . Carbon::parse($visitor->date)->format('Y');
                    break;
                case 'perMonth':
                    $this->dates[] = Carbon::parse($visitor->date)->format('F Y');
                    break;
                case 'perYear':
                    $this->dates[] = Carbon::parse($visitor->date)->format('Y');
                    break;
                default:
                    // Handle unknown scope
                    break;
            }
            $this->views[] = $visitor->views;
        }

//        dd($this->visitors);
//        $this->total = array_sum(is_array($this->views)?? $this->views);
        $this->dispatchBrowserEvent('chart-updated', ['views' => $this->views, 'dates' => $this->dates]);
    }

}

