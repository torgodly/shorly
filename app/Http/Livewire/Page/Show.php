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
    public $sociallinks;
    public function render()
    {
        $this->title = $this->model->page?->title;
        $this->description = $this->model->page?->description;

        $this->imgurl = $this->model->id . '.png?' . rand(1, 10000);


        $this->messengers = $this->model->messengers()->orderBy('id', 'desc')->whereNotNull('value')->get();
        $this->sociallinks = $this->model->sociallinks()->orderBy('id', 'desc')->whereNotNull('value')->get();

        return view('livewire.page.show');

    }
}
