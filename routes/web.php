<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialteController;
use App\Http\Controllers\PusherController;
use Illuminate\Support\Facades\Route;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;

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

require __DIR__ . '/auth.php';

Route::get('/auth/google', [SocialteController::class, 'redirectToGoogle'])->name('google');
Route::get('/auth/google/callback', [SocialteController::class, 'handleGoogleCallback'])->name('google.test');

Route::get('/auth/facebook', [SocialteController::class, 'redirectToFacebook'])->name('facebook');
Route::get('/auth/facebook/callback', [SocialteController::class, 'handleFacebookCallback']);

Route::get('messanger', function () {
    return view('messanger');
});


Route::post('/sockets/connect', [PusherController::class, 'broadcast']);


// Route::post('/send-message', 'MessageController@sendMessage');
