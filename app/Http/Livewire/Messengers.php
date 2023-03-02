<?php

namespace App\Http\Livewire;

use App\Models\Messenger;
use Auth;
use Livewire\Component;

class Messengers extends Component
{


    public $messenger;
    public $telegram;
    public $skype;
    public $phone_number;
    public $viber;


    public $whatsapp;
    public $whatsapp_message;


    public $email;
    public $email_subject;

    protected $rules = [
        'messenger' => 'string|max:255|nullable',
        'telegram' => 'string|max:255|nullable',
        'email' => 'string|email|nullable',
        'email_subject' => 'string|max:255|nullable',
        'whatsapp' => 'string|max:255|nullable',
        'whatsapp_message' => 'string|max:255|nullable',
        'skype' => 'string|max:255|nullable',
        'viber' => 'string|max:255|nullable',
        'phone_number' => 'string|max:255|nullable',
    ];

    public function mount()
    {
        $this->messenger = Auth::user()->MessengerValue('messenger');
        $this->telegram = Auth::user()->MessengerValue('telegram');
        $this->skype = Auth::user()->MessengerValue('skype');
        $this->phone_number = Auth::user()->MessengerValue('phonenumber');
        $this->viber = Auth::user()->MessengerValue('viber');
        $this->whatsapp = Auth::user()->MessengerValue('whatsapp');
        $this->whatsapp_message = Auth::user()->MessengerValue('whatsapp_message');
        $this->email = Auth::user()->MessengerValue('email');
        $this->email_subject = Auth::user()->MessengerValue('email_subject');
    }


    public function render()
    {
        return view('livewire.messengers');
    }

    public function save()
    {
        if ($this->validate()){
            $this->showMessengers = false;
        }


        Auth::user()->messengers()->updateOrCreate([
            'name' => 'messenger',
        ], [
            'value' => empty($this->messenger) ? null : $this->messenger
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'telegram',
        ], [
            'value' => empty($this->telegram) ? null : $this->telegram
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'whatsapp',
        ], [
            'value' => empty($this->whatsapp) ? null : $this->whatsapp,
            'message' => empty($this->whatsapp_message) ? null : $this->whatsapp_message
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'email',
        ], [
            'value' => empty($this->email) ? null : $this->email,
            'message' => empty($this->email_subject) ? null : $this->email_subject
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'viber',
        ], [
            'value' => empty($this->viber) ? null : $this->viber
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'skype',
        ], [
            'value' => empty($this->skype) ? null : $this->skype
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'phone',
        ], [
            'value' => empty($this->phone_number) ? null : $this->phone_number
        ]);


    }

    public function clear(){




        $this->messenger = null;
        $this->telegram = null;
        $this->skype = null;
        $this->phone_number = null;
        $this->viber = null;
        $this->whatsapp = null;
        $this->whatsapp_message = null;
        $this->email = null;
        $this->email_subject = null;



        Auth::user()->messengers()->updateOrCreate([
            'name' => 'messenger',
        ], [
            'value' => null
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'telegram',
        ], [
            'value' => null
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'whatsapp',
        ], [
            'value' => null,
            'message' => null
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'email',
        ], [
            'value' => null,
            'message' => null
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'viber',
        ], [
            'value' => null
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'skype',
        ], [
            'value' => null
        ]);
        Auth::user()->messengers()->updateOrCreate([
            'name' => 'phone',
        ], [
            'value' => null
        ]);
    }
}
