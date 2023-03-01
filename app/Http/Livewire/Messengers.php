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
        $this->validate();

        Messenger::updateOrCreate([
            'name' => 'messenger',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->messenger) ? null : $this->messenger
        ]);
        Messenger::updateOrCreate([
            'name' => 'telegram',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->telegram) ? null : $this->telegram
        ]);
        Messenger::updateOrCreate([
            'name' => 'whatsapp',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->whatsapp) ? null : $this->whatsapp
        ]);
        Messenger::updateOrCreate([
            'name' => 'whatsapp_message',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->whatsapp_message) ? null : $this->whatsapp_message
        ]);
        Messenger::updateOrCreate([
            'name' => 'email',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->email) ? null : $this->email
        ]);
        Messenger::updateOrCreate([
            'name' => 'email_subject',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->email_subject) ? null : $this->email_subject
        ]);
        Messenger::updateOrCreate([
            'name' => 'viber',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->viber) ? null : $this->viber
        ]);
        Messenger::updateOrCreate([
            'name' => 'skype',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->skype) ? null : $this->skype
        ]);
        Messenger::updateOrCreate([
            'name' => 'phone_number',
            'user_id' => Auth::user()->id
        ], [
            'value' => empty($this->phone_number) ? null : $this->phone_number
        ]);


    }
}
