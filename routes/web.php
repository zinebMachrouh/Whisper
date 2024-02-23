<?php

use App\Http\Controllers\ProfileController;


use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// //google 
// Route::get('auth/google', [LoginController::class, 'redirect'])->name('google-auth');
// Route::get('auth/google', [LoginController::class, 'handleGoogleCallback']);

// //github 
// Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.google');
// Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

// //facebook 
// Route::get('login/github', [LoginController::class, 'redirectToGithub'])->name('login.google');
// Route::get('login/github/callback', [LoginController::class, 'handleGithubCallback']);


 

