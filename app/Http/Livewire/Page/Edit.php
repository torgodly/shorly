<?php

namespace App\Http\Livewire\Page;

use App\Models\Button;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Edit extends Component
{
    public $showHeadings = false;
    public $showMessengers = false;
    public $showSocialLinks = false;
    public $showCreateButton = false;
    public $showShare = true;
    public $imgurl;

//    header
    public $title, $description;
//messenger
    public $messenger, $telegram, $skype, $phone, $viber, $whatsapp, $whatsappMessage, $email, $emailSubject;
//social links

    public $facebook, $instagram, $twitter, $youtube, $tiktok, $pinterest, $linkedin, $patreon, $snapchat, $github;
//    custom buttons
    public $customtitle, $customurl, $oldtitle, $oldurl;

//    collection
    public $messengers, $socialLinks, $SecretMessage, $Buttons;


    protected $rules = [
        'title' => 'nullable|max:225',
        'description' => 'nullable|max:225',

        'facebook' => 'string|max:255|nullable',
        'instagram' => 'string|max:255|nullable',
        'twitter' => 'string|max:255|nullable',
        'youtube' => 'string|max:255|nullable',
        'tiktok' => 'string|max:255|nullable',
        'pinterest' => 'string|max:255|nullable',
        'linkedin' => 'string|max:255|nullable',
        'patreon' => 'string|max:255|nullable',
        'snapchat' => 'string|max:255|nullable',
        'github' => 'string|max:255|nullable',
        'customtitle' => 'string|max:255|nullable|required_with:customurl',
        'customurl' => 'string|max:255|nullable|required_with:customtitle',

    ];

    public function mount()
    {
        $this->SecretMessage = Auth::user()->secret_message;
        $this->title = Auth::user()->page?->title;
        $this->description = Auth::user()->page?->description;

        $this->Buttons = Auth::user()->buttons;

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

        // Retrieve the user's social links and convert them to an array
        $this->socialLinks = Auth::user()->socialLinks()
            ->orderBy('id', 'desc')
            ->whereNotNull('value')
            ->get();
        foreach ($this->socialLinks as $socialLink) {
            $this->{$socialLink->name} = $socialLink->value;
        }
    }

    public function render()
    {

        $this->imgurl = Auth::user()->id . '.png?' . rand(1, 10000);
        return view('livewire.page.edit', [
            'messengers' => $this->messengers,
            'socialLinks' => $this->socialLinks,
        ]);
    }

    public function saveHeadings()
    {
        if ($validatedData = $this->validate($this->rules)) {
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

    public function clearHeadings()
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

    public function saveMessengers()
    {
        $validatedData = $this->validate([
            'messenger' => 'string|max:255|nullable',
            'telegram' => 'string|max:255|nullable',
            'email' => 'string|email|nullable',
            'emailSubject' => 'string|max:255|nullable',
            'whatsapp' => 'string|max:255|nullable',
            'whatsappMessage' => 'string|max:255|nullable',
            'skype' => 'string|max:255|nullable',
            'viber' => 'string|max:255|nullable',
            'phone' => 'string|max:255|nullable',
        ]);

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

    public function clearMessengers()
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

    public function saveSocialLinks()
    {

        if ($validatedData = $this->validate($this->rules)) {
            $socialLinks = [
                'facebook',
                'instagram',
                'twitter',
                'youtube',
                'tiktok',
                'pinterest',
                'linkedin',
                'patreon',
                'snapchat',
                'github'
            ];
            foreach ($socialLinks as $name) {
                $value = ($this->{$name} === '') ? null : $this->{$name};
                Auth::user()->socialLinks()->updateOrCreate(
                    ['name' => $name],
                    ['value' => $value]
                );
            }
            $this->mount();
            $this->showSocialLinks = false;
            $this->showShare = true;
        }


    }

    public function clearSocialLinks()
    {

        $fields = [
            'facebook',
            'instagram',
            'twitter',
            'youtube',
            'tiktok',
            'pinterest',
            'linkedin',
            'patreon',
            'snapchat',
            'github'
        ];

        foreach ($fields as $field) {
            $this->{$field} = null;
            Auth::user()->socialLinks()->updateOrCreate(
                ['name' => $field],
                ['value' => null]
            );
        }
        $this->mount();
        $this->showSocialLinks = false;
        $this->showShare = true;

    }

    public function delete_image()
    {
        File::delete(public_path('images/UserAvatar/' . Auth::user()->id . '.png'));
        return redirect(request()->header('Referer'));
    }

    public function SaveCustomButton()
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

    public function EditCustomButton($id)
    {
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

    public function StatusToggle()
    {
        Auth::user()->StatusToggle();
    }
}

