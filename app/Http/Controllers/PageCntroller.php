<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCntroller extends Controller
{
    public function edit(){
        return view('pages.edit');
    }
}
