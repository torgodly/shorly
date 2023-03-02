<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SocialLinks extends Component
{

    public $facebook;
    public $instagram;
    public $twitter;
    public $youtube;
    public $tiktok;
    public $pinterest;
    public $linkdin;
    public $patreon;
    public $snapchat;
    public function render()
    {
        return view('livewire.social-links');
    }
}
