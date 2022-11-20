<?php

use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/* HOME PAGE */
Route::get('/', function () {
    return view('welcome');
});

/* DASHBOARD */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* USER PROFILE */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* GOOGLE LOGIN */
Route::get('/google-login', [SocialAuthController::class, 'googleRedirect'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('google.login.callback');


require __DIR__.'/auth.php';
