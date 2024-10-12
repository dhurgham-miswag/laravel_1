<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    // Redirect to Google OAuth
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

    // Handle Google callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user exists in your database
            $user = User::where('email', $googleUser->getEmail())->first();

            // If the user doesn't exist, create a new user
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),  // Optional: Save Google ID for future use
                    'password' => bcrypt('123456dummy'),  // You can set a random dummy password since users won't need it
                ]);
            }

            // Log the user in
            Auth::login($user);

            // Redirect to the intended page after login
            return redirect()->intended('/home');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}

