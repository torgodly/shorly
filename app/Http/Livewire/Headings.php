<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Headings extends Component
{
    public $title ;
    public $description;

    public function render()
    {
        return view('livewire.headings',);
    }

    public function save(){
        Auth::user()->page
    }

}
