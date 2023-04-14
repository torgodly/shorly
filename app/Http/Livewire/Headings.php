<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Headings extends Component
{
    public $showHeadings = false;


    //    header
    public $title, $description;
    protected $rules = [
        'title' => 'nullable|max:225',
        'description' => 'nullable|max:225',
    ];

    public function mount()
    {
        $this->title = Auth::user()->page?->title;
        $this->description = Auth::user()->page?->description;
    }

    public function render()
    {
        return view('livewire.headings');
    }

    public function save()
    {
        $validatedData = $this->validate($this->rules);
        if ($validatedData) {
            Auth::user()->page()->updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'title' => $validatedData['title'] ?? null,
                    'description' => $validatedData['description'] ?? null
                ]
            );
            $this->showHeadings = false;
            $this->showShare = true;
        }

    }

    public function clear()
    {
        $this->title = null;
        $this->description = null;
        Auth::user()->page()->updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'title' => null,
                'description' => null
            ]
        );
    }
}
