<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('login');
    Route::post('/login', 'authenticate')->name('login');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'show')->name('regiser');
    Route::post('/register', 'authenticate')->name('register');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile/{username}', 'show')->name('profile.username');
    Route::get('/profile', 'showEdit')->name('profile');
    Route::post('/profile', 'update')->name('profile');
});
