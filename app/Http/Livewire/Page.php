<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Page extends Component
{
    public $imgurl;
    public $title;
    public $description;


    public function render()
    {
        $this->imgurl = Auth::user()->id.'.png?'.rand(1,10000);

        $this->title = Auth::user()->page?->title;
        $this->description = Auth::user()->page?->description;
        return view('livewire.page');
    }

    public function delete_image(){
        File::delete(public_path('images/UserAvatar/'.Auth::user()->id.'.png'));
        return redirect(request()->header('Referer'));

    }
}
