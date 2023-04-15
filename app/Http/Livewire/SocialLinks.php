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


    public function extractUsername($platform, $input)
    {
        // Check if input matches any of the patterns for supported platforms
        switch ($platform) {
            case 'facebook':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:(?:facebook\.com|fb\.me)\/(?:(?:\w\.)*#!\/)?(?:pages\/)?(?:[^\s\/]+\/)?([^\s\/?]+)(?:(?:\/)?|\?)?|(?:m\.me\/([^\s\/?]+)))/';
                break;
            case 'instagram':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:instagram\.com\/(?:[a-zA-Z0-9_\-\.]+\/)?)([a-zA-Z0-9_\-\.]+)/';
                break;
            case 'twitter':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:twitter\.com\/)([a-zA-Z0-9_]+)/';
                break;
            case 'youtube':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:channel\/|(?:@)?))(?!videos)([a-zA-Z0-9_-]+)/';
                break;
            case 'tiktok':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:tiktok\.com\/@)([a-zA-Z0-9_\-\.]+)/';
                break;
            case 'pinterest':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:(?:pinterest\.com\/)|(?:pin\.it\/))([a-zA-Z0-9_\-\.]+)/';
                break;
            case 'linkedin':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:linkedin\.com\/(?:in|company)\/)([a-zA-Z0-9_\-\.]+)/';
                break;
            case 'patreon':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:patreon\.com\/)([a-zA-Z0-9_\-\.]+)/';
                break;
            case 'snapchat':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:snapchat\.com\/add\/)([a-zA-Z0-9_\-]+)/';
                break;
            case 'github':
                $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:github\.com\/)([a-zA-Z0-9_\-\.]+)/';
                break;
            default:
                return $input;
        }

        // If the input is a URL and it's a supported platform URL, extract the username or user ID
        if (preg_match($pattern, $input, $matches)) {
            if (strpos($input, 'facebook.com') !== false || strpos($input, 'fb.me') !== false) {
                $username = preg_match('/^(?:https?:\/\/)?(?:www\.)?(?:facebook|messenger)\.com\/(?!profile\.php).*?([^\/?]+)/', $input, $matches) ? ($matches[1] ?? '') : null;
                $user_id = preg_match('/id=(\d+)/', $input, $matches) ? ($matches[1] ?? '') : null;
                return $username ?? $user_id ?? null;
            } else {
                return isset($matches[1]) ? $matches[1] : null;
            }
        }

        // Return the input as it is
        return $input;
    }

    public function updatedFacebook()
    {
        $this->facebook = $this->extractUsername('facebook', $this->facebook);
    }

    public function updatedInstagram()
    {
        $this->instagram = $this->extractUsername('instagram', $this->instagram);
    }

    public function updatedTwitter()
    {
        $this->twitter = $this->extractUsername('twitter', $this->twitter);
    }

    public function updatedYoutube()
    {
        $this->youtube = $this->extractUsername('youtube', $this->youtube);
    }

    public function updatedTiktok()
    {
        $this->tiktok = $this->extractUsername('tiktok', $this->tiktok);
    }

    public function updatedPinterest()
    {
        $this->pinterest = $this->extractUsername('pinterest', $this->pinterest);
    }

    public function updatedLinkedin()
    {
        $this->linkedin = $this->extractUsername('linkedin', $this->linkedin);
    }

    public function updatedPatreon()
    {
        $this->patreon = $this->extractUsername('patreon', $this->patreon);
    }

    public function updatedSnapchat()
    {
        $this->snapchat = $this->extractUsername('snapchat', $this->snapchat);
    }

    public function updatedGithub()
    {
        $this->github = $this->extractUsername('github', $this->github);
    }

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
