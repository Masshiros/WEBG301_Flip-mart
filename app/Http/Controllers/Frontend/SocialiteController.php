<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Check if the user already exists in your database
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user account
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->facebook_id = $user->getId();
            $newUser->password = bcrypt('default_password'); // Set a default password
            $newUser->save();

            // Log in the newly created user
            Auth::login($newUser);
        }

        // Redirect the user to the desired page after login
        return redirect('dashboard');
    }
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user already exists in your database
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user account
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->google_id = $user->getId();
            $newUser->password = bcrypt('default_password'); // Set a default password
            $newUser->save();

            // Log in the newly created user
            Auth::login($newUser);
        }

        // Redirect the user to the desired page after login
        return redirect('dashboard');

    }
}
