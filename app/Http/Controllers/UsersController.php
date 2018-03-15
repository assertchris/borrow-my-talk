<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Socialite;
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
                Rule::unique('users')->ignore($user->id),
            ],
            'handle' => [
                'required',
                Rule::unique('users')->ignore($user->id),
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

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        $data = Socialite::driver('twitter')->user();

        $user = auth()->user();
        $user->twitter_id = $data->id;
        $user->twitter_token = $data->token;
        $user->twitter_token_secret = $data->tokenSecret;
        $user->save();

        return redirect()->route('users.settings');
    }

    public function disconnectTwitter()
    {
        $user = auth()->user();
        $user->twitter_id = null;
        $user->twitter_token = null;
        $user->twitter_token_secret = null;
        $user->save();

        return redirect()->route('users.settings');
    }
}
