<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Authenticate;
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
    Route::get('/login', 'show')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'show')->name('regiser')->middleware('guest');
    Route::post('/register', 'authenticate')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{username}', 'show')->name('profile.username')->withoutMiddleware('auth');
        Route::get('/profile', 'showEdit')->name('profile');
        Route::post('/profile', 'update')->name('profile');
    });
});

Route::middleware(Admin::class)->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/news', 'showNews')->name('admin');
        Route::post('/admin/news', 'editNews')->name('admin');
        Route::get('/admin/faq/categories', 'showFaqCats')->name('admin');
        Route::post('/admin/faq/categories', 'editFaqCats')->name('admin');
        Route::get('/admin/faq/questions-and-answers', 'showFaq')->name('admin');
        Route::post('/admin/faq/questions-and-answers', 'editFaq')->name('admin');
        Route::get('/admin/contact', 'showContact')->name('admin');
        Route::get('/admin/contact', 'respondContact')->name('admin');
    });
});
