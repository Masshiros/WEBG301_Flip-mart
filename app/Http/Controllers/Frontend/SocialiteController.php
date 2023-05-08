<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
        $existingUser = User::where('email_fb', $user->getEmail())->first();

        if ($existingUser) {
            // Update the existing user's Facebook ID and profile photo
            $existingUser->facebook_id = $user->getId();
            $existingUser->profile_photo_path = $user->getAvatar();
            $existingUser->save();

            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user account
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getId() . '@flip_mart.com';
            $newUser->email_fb = $user->getEmail();
            $newUser->facebook_id = $user->getId();
            $newUser->profile_photo_path = $user->getAvatar();
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
        $existingUser = User::where('email_gg', $user->getEmail())->first();
        // dd($existingUser);
        if ($existingUser) {
            // Update the existing user's Google ID and profile photo
            $existingUser->google_id = $user->getId();
            $existingUser->profile_photo_path = $user->getAvatar();
            $existingUser->save();

            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user account
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getId() . '@flip_mart.com';
            $newUser->email_gg = $user->getEmail();
            $newUser->google_id = $user->getId();
            $newUser->profile_photo_path = $user->getAvatar();
            $newUser->password = bcrypt('default_password'); // Set a default password
            $newUser->save();

            // Log in the newly created user
            Auth::login($newUser);
        }

        // Redirect the user to the desired page after login
        return redirect('dashboard');
    }
}