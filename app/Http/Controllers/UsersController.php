<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Socialite;

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
    
    public function profile(User $user)
    {
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
        $user = auth()->user();
        $redirect = route('users.settings');

        $data = Socialite::driver('twitter')->user();

        if (!$user) {
            $user = User::where('twitter_id', $data->id)->orWhere('email', $data->email)->first();

            if (!$user) {
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->password = 'need-to-reset';
            }

            $redirect = route('home');
        }

        $user->twitter_id = $data->id;
        $user->twitter_token = $data->token;
        $user->twitter_token_secret = $data->tokenSecret;
        $user->twitter_auth_at = Carbon::now();

        $user->save();

        Auth::login($user, true);

        return redirect($redirect);
    }

    public function disconnectTwitter()
    {
        $user = auth()->user();
        $user->twitter_id = null;
        $user->twitter_token = null;
        $user->twitter_token_secret = null;
        $user->twitter_auth_at = null;
        $user->save();

        return redirect()->route('users.settings');
    }
}
