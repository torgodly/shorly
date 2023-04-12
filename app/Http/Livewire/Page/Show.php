<?php

namespace App\Http\Livewire\Page;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public Model $model;

    public $imgurl;
    public $messengers;
    public $socialLinks;
    public $SecretMessage;
    public $Buttons;
    public function render()
    {
        $this->SecretMessage = $this->model->secret_message;
        $this->title = $this->model->page?->title;
        $this->description = $this->model->page?->description;

        $this->imgurl = $this->model->id . '.png?' . rand(1, 10000);

        $this->messengers = $this->model->messengers()->orderBy('id', 'desc')->whereNotNull('value')->get();
        $this->socialLinks = $this->model->socialLinks()->orderBy('name', 'asc')->whereNotNull('value')->get();
        $this->Buttons = $this->model->buttons;

        return view('livewire.page.show');

    }
}
