<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback() {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if(!$user){
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => '', // Set a default password or handle it as per your requirement
                ]);
            }

            $token = $user->createToken('GoogleLogin')->plainTextToken;

            return redirect()->away('http://localhost:3000/auth/callback?token=' . $token . '&name=' . urlencode($user->name));
        } catch (\Exception $e) {
            return redirect()->away('http://localhost:3000/login?error=google_login_failed');
        }
    }
}
