<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageCntroller extends Controller
{
    public function edit()
    {
        return view('pages.edit');
    }

    public function update(Request $request)
    {
//        return response('Hello World', 200)
//            ->header('Content-Type', 'text/plain');
////                dd('hi');
//        dd($request->all());
        if (request()->has('file')) {
            $fileName = Auth::user()->id . '.png';
            request()->file->move(public_path('images/UserAvatar'), $fileName);
            Auth::user()->update(['updated_at' => now()]);
        }
    }
}
