<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InfoController;
use App\Http\Middleware\Admin;
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

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'show')->name('login');
        Route::get('/logout', 'logout')->name('logout')->withoutMiddleware('guest')->middleware('auth');
        Route::post('/login', 'authenticate')->name('login');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'show')->name('register');
        Route::post('/register', 'authenticate')->name('register');
    });

    Route::controller(ForgotController::class)->group(function () {
        Route::get('/forgot', 'show')->name('forgot');
        Route::post('/forgot', 'request')->name('forgot');
        Route::get('/reset/{token}', 'showReset')->name('reset');
        Route::post('/reset/{token}', 'reset')->name('reset');
    });
});

Route::controller(IdeaController::class)->group(function () {
    Route::get('/ideas', 'showIdeas')->name('ideas.list');
    Route::get('/ideas/create', 'showCreateIdea')->name('ideas.create')->middleware('auth');
    Route::post('/ideas/create', 'addIdea')->name('ideas.add');
    Route::post('/ideas/proposal', 'storeProposal')->name('ideas.proposal')->middleware('auth');
    Route::post('/ideas/accept', 'acceptProposal')->name('ideas.accept')->middleware('auth');
});

Route::controller(InfoController::class)->group(function () {
    Route::get('/', 'showHome')->name('home');
    Route::get('/faq', 'showFaqs')->name('showFaqs');
    Route::get('/about', 'showAbout')->name('showAbout');
    Route::get('/news', 'showNews')->name('showNews');
    Route::get('/news/{slug}', 'showNew')->name('showNewsSlug');
    Route::post('/news/{slug}', 'addNewsComment')->name('addNewsComment');
    Route::get('/contact', 'showContact')->name('showContact');
    Route::post('/contact', 'sendForm')->name('sendForm');
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{username}', 'show')->name('profile.username')->withoutMiddleware('auth');
        Route::get('/profile', 'showEdit')->name('profile.show');
        Route::post('/profile/general', 'update')->name('profile.edit');
        Route::post('/profile/password', 'updatePassword')->name('profile.password');
    });
});

Route::middleware(Admin::class)->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/news', 'dashboard')->name('admin.dashboard');
        Route::get('/admin/news', 'showNews')->name('admin.shownews');
        Route::post('/admin/news/edit', 'editNews')->name('admin.editnews');
        Route::post('/admin/news/add', 'addNews')->name('admin.addnews');
        Route::post('/admin/news/delete', 'deleteNews')->name('admin.deletenews');
        Route::get('/admin/faq/categories', 'showFaqCats')->name('admin.showfaqcats');
        Route::post('/admin/faq/categories/edit', 'editFaqCat')->name('admin.editfaqcat');
        Route::post('/admin/faq/categories/add', 'addFaqCat')->name('admin.addfaqcat');
        Route::post('/admin/faq/categories/delete', 'deleteFaqCat')->name('admin.deletefaqcat');
        Route::get('/admin/faq/questions-and-answers', 'showFaqs')->name('admin.showfaqs');
        Route::post('/admin/faq/questions-and-answers/edit', 'editFaq')->name('admin.editfaq');
        Route::post('/admin/faq/questions-and-answers/add', 'addFaq')->name('admin.addfaq');
        Route::post('/admin/faq/questions-and-answers/delete', 'deleteFaq')->name('admin.deletefaq');
        Route::get('/admin/promote', 'showAdmins')->name('admin.showadmins');
        Route::post('/admin/promote', 'promoteUser')->name('admin.promoteuser');
        Route::get('/admin/contact', 'showContacts')->name('admin.showcontacts');
        Route::post('/admin/contact', 'respondToContact')->name('admin.respondtocontact');
    });
});
