<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SocialteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/auth/redirect', [ProviderController::class, 'redirect']);
 
Route::get('/auth/callback', [ProviderController::class, 'callback']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profilePage', [ProfileController::class, 'updatePage'])->name('profile.updatePage');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/auth/google', [SocialteController::class,'redirectToGoogle'])->name('google');
Route::get('/auth/google/callback', [SocialteController::class,'handleGoogleCallback'])->name('google.test');

Route::get('/auth/facebook', [SocialteController::class,'redirectToFacebook'])->name('facebook');
Route::get('/auth/facebook/callback', [SocialteController::class,'handleFacebookCallback']);
