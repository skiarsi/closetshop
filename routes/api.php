<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('access_token')->plainTextToken;

    return response()->json(['token' => $token]);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/protected', function (Request $request) {
        return response()->json([
            'message' => 'This is a protected route',
            'user' => $request->user(),
        ]);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});


// google authentication
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/callback/google', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('login')->middleware('guest')->name('login');
