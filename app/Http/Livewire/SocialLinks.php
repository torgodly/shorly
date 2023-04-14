<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SocialLinks extends Component
{
    public $showSocialLinks = false;

    //social links
    public $facebook, $instagram, $twitter, $youtube, $tiktok, $pinterest, $linkedin, $patreon, $snapchat, $github;

    public $socialLinks;
    protected $rules = [


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


    ];

    public function mount()
    {
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
        return view('livewire.social-links', [ 'socialLinks' => $this->socialLinks]);
    }

    public function save()
    {
        $validatedData = $this->validate($this->rules);
        if ($validatedData) {
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


    public function clear()
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


}
