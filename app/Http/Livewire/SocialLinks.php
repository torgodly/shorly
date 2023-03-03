<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SocialLinks extends Component
{

    public $facebook;
    public $instagram;
    public $twitter;
    public $youtube;
    public $tiktok;
    public $pinterest;
    public $linkedin;

    public $patreon;
    public $snapchat;

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
    ];

    public function mount()
    {
        $this->facebook = Auth::user()->SocialLink('facebook');
        $this->instagram = Auth::user()->SocialLink('instagram');
        $this->twitter = Auth::user()->SocialLink('twitter');
        $this->youtube = Auth::user()->SocialLink('youtube');
        $this->tiktok = Auth::user()->SocialLink('tiktok');
        $this->pinterest = Auth::user()->SocialLink('pinterest');
        $this->linkedin = Auth::user()->SocialLink('linkedin');
        $this->patreon = Auth::user()->SocialLink('patreon');
        $this->snapchat = Auth::user()->SocialLink('snapchat');

    }

    public function render()
    {
        return view('livewire.social-links');
    }

    public function save()
    {
        $this->validate();

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


    }

    public function clear(){
        $this->facebook = null;
        $this->instagram = null;
        $this->twitter = null;
        $this->youtube = null;
        $this->tiktok = null;
        $this->pinterest = null;
        $this->linkedin = null;
        $this->patreon = null;
        $this->snapchat = null;


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
            'name' => 'patreon',
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
    }
}
