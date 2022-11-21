<?php

use App\Http\Controllers\Comics\ComicController;
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

Route::resource('/comics', ComicController::class)->middleware('auth');

require __DIR__.'/auth.php';
