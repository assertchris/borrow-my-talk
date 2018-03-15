<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Unique;
use Illuminate\Http\Request;
use User;

class UsersController extends Controller
{
    public function settings()
    {
        return view('users.settings', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required',
            'handle' => 'required|alpha_dash',
            'email' => [
                'required',
                (new Unique('users'))->ignore($user->id),
            ],
            'handle' => [
                'required',
                (new Unique('users'))->ignore($user->id),
            ],
        ]);

        $user->name = $request->input('name');
        $user->handle = $request->input('handle');
        $user->email = $request->input('email');
        $user->from_under_represented_group = $request->input('from-under-represented-group') ? true : false;
        $user->from_under_represented_group_additional = $request->input('from-under-represented-group-additional');
        $user->save();

        return redirect('/home');
    }
    
    public function profile()
    {
        $user = auth()->user();
        $topics = $user->topics()->orderBy('name', 'asc')->get();

        return view('users.profile', [
            'user' => $user,
            'topics' => $topics,
        ]);
    }
}
