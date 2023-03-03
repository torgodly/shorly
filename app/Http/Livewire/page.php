<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use function Pest\Laravel\get;
use function PHPUnit\Framework\isEmpty;

class page extends Component
{
    public $imgurl;
    public $title;
    public $description;

    public $messengers;
    public $sociallinks;

    public function render()
    {
        $this->imgurl = Auth::user()->id.'.png?'.rand(1,10000);
        $this->title = Auth::user()->page?->title;
        $this->description = Auth::user()->page?->description;

        $this->messengers = Auth::user()->messengers()->orderBy('id','desc')->whereNotNull('value')->get();
        $this->sociallinks = Auth::user()->sociallinks()->orderBy('id', 'desc')->whereNotNull('value')->get();
        return view('livewire.page', ['messengers' => $this->messengers, 'sociallinks' => $this->sociallinks]);
    }

    public function delete_image(){
        File::delete(public_path('images/UserAvatar/'.Auth::user()->id.'.png'));
        return redirect(request()->header('Referer'));

    }


}
