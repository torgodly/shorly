<?php

namespace App\Http\Livewire\Page;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Edit extends Component
{

    public $showHeadings = false;
    public $showMessengers = false;
    public $showSocialLinks = false;

    public $imgurl;

    //    headers
    public $title;
    public $description;

    //    messengers
    public $messenger;
    public $telegram;
    public $skype;
    public $phone_number;
    public $viber;
    public $whatsapp;
    public $whatsapp_message;
    public $email;
    public $email_subject;
    // social links
    public $facebook;
    public $instagram;
    public $twitter;
    public $youtube;
    public $tiktok;
    public $pinterest;
    public $linkedin;

    public $patreon;
    public $snapchat;

    public $github;

    public $messengers;
    public $sociallinks;


    public function mount()
    {



        //        Headings
        $this->title = Auth::user()->page?->title;
        $this->description = Auth::user()->page?->description;
        //         messenger
        $this->messenger = Auth::user()->MessengerValue('messenger');
        $this->telegram = Auth::user()->MessengerValue('telegram');
        $this->skype = Auth::user()->MessengerValue('skype');
        $this->phone_number = Auth::user()->MessengerValue('phonenumber');
        $this->viber = Auth::user()->MessengerValue('viber');
        $this->whatsapp = Auth::user()->MessengerValue('whatsapp');
        $this->whatsapp_message = Auth::user()->MessengerValue('whatsapp_message');
        $this->email = Auth::user()->MessengerValue('email');
        $this->email_subject = Auth::user()->MessengerValue('email_subject');
        // social links

        $this->facebook = Auth::user()->SocialLink('facebook');
        $this->instagram = Auth::user()->SocialLink('instagram');
        $this->twitter = Auth::user()->SocialLink('twitter');
        $this->youtube = Auth::user()->SocialLink('youtube');
        $this->tiktok = Auth::user()->SocialLink('tiktok');
        $this->pinterest = Auth::user()->SocialLink('pinterest');
        $this->linkedin = Auth::user()->SocialLink('linkedin');
        $this->patreon = Auth::user()->SocialLink('patreon');
        $this->snapchat = Auth::user()->SocialLink('snapchat');
        $this->github = Auth::user()->SocialLink('github');
    }

    public function render()
    {


        $this->imgurl = Auth::user()->id . '.png?' . rand(1, 10000);


        $this->messengers = Auth::user()->messengers()->orderBy('id', 'desc')->whereNotNull('value')->get();
        $this->sociallinks = Auth::user()->sociallinks()->orderBy('name', 'asc')->whereNotNull('value')->get();

        return view('livewire.page.edit', ['messengers' => $this->messengers, 'sociallinks' => $this->sociallinks]);
    }

    public function saveHeadings()
    {
        if ($this->validate([
            'title' => 'nullable|max:225',
            'description' => 'nullable|max:225',
        ])) {
            $this->showHeadings = false;
            Auth::user()->page()->updateOrCreate(
                ['user_id' => 1],
                [
                    'title' => empty($this->title) ? null : $this->title,
                    'description' => empty($this->description) ? null : $this->description
                ]
            );
        }
    }

    public function clearHeadings()
    {

        $this->title = null;
        $this->description = null;

        Auth::user()->page()->updateOrCreate(
            ['user_id' => 1],
            [
                'title' => null,
                'description' => null
            ]
        );
    }

    // Messengers
    public function saveMessengers()
    {
        if ($this->validate([
            'messenger' => 'string|max:255|nullable',
            'telegram' => 'string|max:255|nullable',
            'email' => 'string|email|nullable',
            'email_subject' => 'string|max:255|nullable',
            'whatsapp' => 'string|max:255|nullable',
            'whatsapp_message' => 'string|max:255|nullable',
            'skype' => 'string|max:255|nullable',
            'viber' => 'string|max:255|nullable',
            'phone_number' => 'string|max:255|nullable',
        ])) {
            $this->showMessengers = false;
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
    }

    public function clearMessengers()
    {
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

    // social links

    public function saveSocialLinks()
    {

        if ($this->validate([
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
        ])) {
            $this->showSocialLinks = false;
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'facebook',
            ], [
                'value' => empty($this->facebook) ? null : $this->facebook
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'twitter',
            ], [
                'value' => empty($this->twitter) ? null : $this->twitter
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'instagram',
            ], [
                'value' => empty($this->instagram) ? null : $this->instagram
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'tiktok',
            ], [
                'value' => empty($this->tiktok) ? null : $this->tiktok
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'pinterest',
            ], [
                'value' => empty($this->pinterest) ? null : $this->pinterest
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'linkedin',
            ], [
                'value' => empty($this->linkedin) ? null : $this->linkedin
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'patreon',
            ], [
                'value' => empty($this->patreon) ? null : $this->patreon
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'youtube',
            ], [
                'value' => empty($this->youtube) ? null : $this->youtube
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'snapchat',
            ], [
                'value' => empty($this->snapchat) ? null : $this->snapchat
            ]);
            Auth::user()->sociallinks()->updateOrCreate([
                'name' => 'github',
            ], [
                'value' => empty($this->github) ? null : $this->github
            ]);
        }
    }

    public function clearSocialLinks()
    {
        $this->facebook = null;
        $this->instagram = null;
        $this->twitter = null;
        $this->youtube = null;
        $this->tiktok = null;
        $this->pinterest = null;
        $this->linkedin = null;
        $this->patreon = null;
        $this->snapchat = null;
        $this->github = null;


        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'facebook',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'twitter',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'instagram',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'tiktok',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'pinterest',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'linkedin',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name'
            => 'patreon',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'youtube',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'snapchat',
        ], [
            'value' => null
        ]);
        Auth::user()->sociallinks()->updateOrCreate([
            'name' => 'github',
        ], [
            'value' => null
        ]);
    }



    public function delete_image()
    {
        File::delete(public_path('images/UserAvatar/' . Auth::user()->id . '.png'));
        return redirect(request()->header('Referer'));
    }

}
