<?php

namespace App\Http\Livewire\Messages;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{

    public $incomingMessage = true;
    public $favorite = false;
    public $delete = false;
    public $messageId;
    protected $messages;
    protected $favorites;




    public function render()
    {
        $this->messages = Auth::user()->messages()->orderBy('created_at', 'desc')->paginate(10);
        $this->favorites = Auth::user()->messages()->where('is_favorite', true)->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.messages.show', ['messages' => $this->messages, 'favorites' => $this->favorites]);
    }

    public function isFavorite($message)
    {
        $message = Message::find($message);
        if (Auth::user()->id == $message->user_id) {
            //update message record is_favorite column to the opposite of what it is
            $message->update(['is_favorite' => !$message->is_favorite]);
//            dd('worked');
        }
//        dd('did not work');
    }

    public function showDelete($message)
    {
        $this->messageId = $message;
//        dd($this->messageId);   //this works
        $this->delete = true;

    }
    public function delete($message)
    {
        $message = Message::find($message);
        if (Auth::user()->id == $message->user_id) {
            $message->delete();
            $this->delete = false;
        }
    }

}
