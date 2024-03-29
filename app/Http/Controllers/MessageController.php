<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index(){
        return view('messages.index');
    }

    public function create(User $user){
        if ($user->secret_message) {
            $imgurl = $user->id . '.png?' . rand(1, 10000);
            return view('messages.create', compact('user', 'imgurl'));
        } else {
            abort(404);
        }


    }

    public function store(Request $request, User $user){
        $message = $request->validate([
            'message' => 'required|max:500'
        ]);

        $message['ip'] = $request->ip();
        $user->messages()->create($message);
        return back()->with(['Success'=> __('Message Sent Successfully')]);
    }
}
