<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Headings extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'nullable|max:225',
        'description' => 'nullable|max:225',
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
        Auth::user()->page()->updateOrCreate(
            ['user_id' => 1],
            [
            'title' => empty($this->title) ? null : $this->title,
            'description' => empty($this->description) ? null : $this->description
        ]);
    }

    public function clear(){

        $this->title = null;
        $this->description = null;

        Auth::user()->page()->updateOrCreate(
            ['user_id' => 1],
            [
                'title' => null,
                'description' => null
            ]);
    }

}
