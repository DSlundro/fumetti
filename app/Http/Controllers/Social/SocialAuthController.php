<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    }
}
