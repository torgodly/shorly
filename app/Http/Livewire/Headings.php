<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Headings extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:6',
        'description' => 'required|',
    ];
    public function mount(){
        $this->title = Auth::user()->page?->title;
        $this->description = Auth::user()->page?->description;
    }
    public function render()
    {

        return view('livewire.headings',);
    }

    public function save(){
        $this->validate();

        Auth::user()->page?->update([
            'title' => $this->title,
            'description' => $this->description
        ]);
    }

}
