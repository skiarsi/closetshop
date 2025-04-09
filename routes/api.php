<?php

use App\Http\Controllers\Auth\CredentialAuth;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::post('/login', [CredentialAuth::class, 'login'])->name('login');
Route::post('/register', [CredentialAuth::class,'register'])->name('register');

Route::middleware('auth:sanctum')->post('/logout', [CredentialAuth::class, 'logout'])->name('logout');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});


// google authentication
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/callback/google', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('login')->middleware('guest')->name('login');
