<?php

namespace App\Http\Livewire\Page;

use App\Models\Button;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Edit extends Component
{

    public $imgurl;


    public function render()
    {

        $this->imgurl = Auth::user()->id . '.png?' . rand(1, 10000);
        return view('livewire.page.edit');
    }


    public function delete_image()
    {
        File::delete(public_path('images/UserAvatar/' . Auth::user()->id . '.png'));
        return redirect(request()->header('Referer'));
    }


}

