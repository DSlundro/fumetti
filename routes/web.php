<?php

use App\Http\Controllers\AllComics\AllComicsController;
use App\Http\Controllers\Comics\ComicController;
use App\Http\Controllers\Comments\CommentController;
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

/* COMICS */
Route::resource('/comics', ComicController::class)->middleware('auth');

/* COMMENTS */
Route::resource('/comments', CommentController::class)->middleware('auth');

/* ALL COMICS */
Route::resource('/all_comics', AllComicsController::class);

require __DIR__.'/auth.php';
