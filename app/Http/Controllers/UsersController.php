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
        ]);

        $user->name = $request->input('name');
        $user->handle = $request->input('handle');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/home');
    }
}
