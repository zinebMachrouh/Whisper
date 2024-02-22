<?php

use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
=======
use App\Http\Controllers\SocialteController;
>>>>>>> 3d5a637899332cd546737a2e9ec1b9425f784baf
use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD
=======

Route::get('/auth/google', [SocialteController::class,'redirectToGoogle'])->name('google');
Route::get('/auth/google/callback', [SocialteController::class,'handleGoogleCallback'])->name('google.test');

Route::get('/auth/facebook', [SocialteController::class,'redirectToFacebook'])->name('facebook');
Route::get('/auth/facebook/callback', [SocialteController::class,'handleFacebookCallback']);


>>>>>>> 3d5a637899332cd546737a2e9ec1b9425f784baf
