<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Visitor;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $title = $user->heading?->title;
        $description = $user->heading?->description;

        visitor()->visit($user, 300);
//        dd($user->visitLogs()->perDay()->toArray());
        return view('pages.show',['user'=>$user,'title'=>$title,'description'=>$description]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(heading $heading)
    {
        return view('pages.edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Heading $page)
    {
        if (request()->has('file')) {
            $fileName = Auth::user()->id . '.png';
            request()->file->move(public_path('images/UserAvatar'), $fileName);
            Auth::user()->update(['updated_at' => now()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Heading $page)
    {
        //
    }
}
