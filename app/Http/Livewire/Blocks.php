<?php

namespace App\Http\Livewire;

use App\Models\Button;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Blocks extends Component
{
    public $showCreateButton = false;



    //    custom buttons
    public $customtitle, $customurl, $oldtitle, $oldurl;

//    collection
    public $SecretMessage, $Buttons, $selectButton;


    protected $rules = [


        'customtitle' => 'string|max:255|nullable|required_with:customurl',
        'customurl' => 'string|max:255|nullable|required_with:customtitle',

    ];

    public function mount()
    {
        $this->SecretMessage = Auth::user()->secret_message;


        $this->Buttons = Auth::user()->buttons;


    }

    public function render()
    {
        return view('livewire.blocks');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'customtitle' => 'required|string|max:255',
            'customurl' => 'required|url|max:255',
        ]);

        Auth::user()->buttons()->updateOrCreate(
            [
                'title' => $this->oldtitle,
                'url' => $this->oldurl
            ],
            [
                'title' => $validatedData['customtitle'],
                'url' => $validatedData['customurl']
            ]
        );

        $this->reset(['customtitle', 'customurl', 'oldtitle', 'oldurl']);
        $this->mount();
        $this->showCreateButton = false;
        $this->showShare = true;
    }

    public function edit($id)
    {
        $this->selectButton = $id;
        $button = Button::find($id);

        $this->fill([
            'customtitle' => $button->title,
            'customurl' => $button->url,
            'oldtitle' => $button->title,
            'oldurl' => $button->url,
            'showCreateButton' => true,
            'showShare' => false,
        ]);
    }

    public function clear(){
        Button::find($this->selectButton)?->delete();
        $this->mount();
        $this->showCreateButton = false;
        $this->showShare = true;
    }

    public function StatusToggle()
    {
        Auth::user()->StatusToggle();
    }
}
