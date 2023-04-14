<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Messengers extends Component
{
    public $showMessengers = false;

    //messenger
    public $messenger, $telegram, $skype, $phone, $viber, $whatsapp, $whatsappMessage, $email, $emailSubject;

    public $messengers;

    protected $rules = [
        'messenger' => 'string|max:255|nullable',
        'telegram' => 'string|max:255|nullable',
        'email' => 'string|email|nullable',
        'emailSubject' => 'string|max:255|nullable',
        'whatsapp' => 'string|max:255|nullable',
        'whatsappMessage' => 'string|max:255|nullable',
        'skype' => 'string|max:255|nullable',
        'viber' => 'string|max:255|nullable',
        'phone' => 'string|max:255|nullable',
    ];

    public function mount()
    {
        // Retrieve the user's messengers and convert them to an array
        $this->messengers = Auth::user()->messengers()
            ->orderBy('id', 'desc')
            ->whereNotNull('value')
            ->get();

        foreach ($this->messengers as $messenger) {
            if (in_array($messenger->name, ['whatsapp', 'email'])) {
                $messageField = $messenger->name === 'whatsapp' ? 'whatsappMessage' : 'emailSubject';
                $this->{$messageField} = $messenger->message;
                $this->{$messenger->name} = $messenger->value;

            } else {
                $this->{$messenger->name} = $messenger->value;
            }
        }

    }

    public function render()
    {
        return view('livewire.messengers', ['messengers' => $this->messengers,]);
    }

    public function save()
    {
        $validatedData = $this->validate($this->rules);

        if ($validatedData) {
            $messengers = [
                'messenger',
                'telegram',
                'whatsapp',
                'email',
                'viber',
                'skype',
                'phone'
            ];
            foreach ($messengers as $name) {
                $value = ($this->{$name} === '') ? null : $this->{$name};
                $message = null;
                if ($name === 'whatsapp') {
                    $message = $this->{$name . 'Message'} ?? null;
                } elseif ($name === 'email') {
                    $message = $this->{$name . 'Subject'} ?? null;
                }
                Auth::user()->messengers()->updateOrCreate(
                    ['name' => $name],
                    ['value' => $value, 'message' => $message]
                );
            }


            $this->mount();
            $this->showMessengers = false;
            $this->showShare = true;

        }

    }

    public function clear()
    {

        $fields = [
            'messenger',
            'telegram',
            'whatsapp',
            'email',
            'viber',
            'skype',
            'phone',

        ];

        foreach ($fields as $field) {
            $this->{$field} = null;
            Auth::user()->messengers()->updateOrCreate(
                ['name' => $field],
                ['value' => null, 'message' => null]
            );
        }

        $this->mount();
        $this->showMessengers = false;
        $this->showShare = true;

    }


}
