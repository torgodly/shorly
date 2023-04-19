<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;

class Show extends Component
{

    public $incomingMessage = true;
    public $favorite = false;

    public function render()
    {
        return view('livewire.messages.show');
    }
}
