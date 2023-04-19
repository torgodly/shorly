<?php

namespace App\Http\Livewire\Messages;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{

    public $incomingMessage = true;
    public $favorite = false;
    protected $messages;
    protected $favorites;


    public function mount()
    {
        //get auth user messages and order by created_at desc and store it in the messages variable
        $this->messages = Auth::user()->messages()->orderBy('created_at', 'desc')->paginate(10);
        $this->favorites = Auth::user()->messages()->where('is_favorite', true)->orderBy('created_at', 'desc')->paginate(10);

    }

    public function render()
    {
        return view('livewire.messages.show', ['messages' => $this->messages, 'favorites' => $this->favorites]);
    }

    public function isFavorite($message)
    {
        $message = Message::find($message);
        if (Auth::user()->id === $message->user_id) {
            //update message record is_favorite column to the opposite of what it is
            $message->update(['is_favorite' => !$message->is_favorite]);
            $this->mount();
        }
    }

}
