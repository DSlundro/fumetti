<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback()
    {
        $userData = Socialite::driver('google')->user();

        $user = User::where('email', $userData->email)->where('account_type', 'google')->first();
        if($user)
        {
            //do login
            Auth::login($user);
            return redirect('/dashboard');
        }
        else{
            // register
            $user = User::updateOrCreate([
                'id' => $userData->id,
                'name' => $userData->user['given_name'],
                'username' => strtok($userData->email, '@'),
                'email' => $userData->email,
                'password' => Hash::make($userData->token),
                'account_type' => 'google'
            ]);

            event(new Registered($user));

            Auth::login($user);
            
            return redirect('/dashboard');
        }





       /*  $existingUser = User::where('email', $userData->email)->where('account_type', 'google')->first();

        if($existingUser) {
            Auth::login($existingUser);
        } else {
            return redirect('register')->with('message', 'Account does not exist, please register!');
        }
        return redirect('/dashboard'); */
    }















    public function googleRegisterCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $existingUser = User::where('email', $googleUser->email)->where('account_type', 'google')->first();

        if($existingUser) {
            return redirect('login')->with('message', 'Account already exist, please log in!');
        } else {
            $user = User::updateOrCreate([
                'id' => $googleUser->id,
                'name' => $googleUser->name,
                'username' => strtok($googleUser->email, '@'),
                'email' => $googleUser->email,
                'password' => Hash::make($googleUser->token),
                'account_type' => 'google'
            ]);
        }
        Auth::login($user);
        return redirect('/dashboard');
    
    }
}
