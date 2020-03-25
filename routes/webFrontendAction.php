<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Frontend Actions
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| this routes are for ADR.
|
*/

Route::name('static.')->group(function () {
    Route::view('/', 'frontend.static.home')->name('home')->middleware('guest');
    Route::view('/about', 'frontend.static.about')->name('about');
    Route::view('/help', 'frontend.static.help')->name('help');
});

Route::name('auth.')->namespace('Auth')->group(function () {
    Route::get('/signup', 'ShowRegistrationFormAction')->name('signup');
    Route::post('/signup', 'SignUpAction');
    Route::get('/login', 'ShowLoginFormAction')->name('login');
    Route::post('/login', 'LoginAction');
    Route::post('/logout', 'LogoutAction')->name('logout');
});

Route::name('verification.')->namespace('Verify')->group(function () {
    Route::get('email/verify', 'ShowVerifyNoticeAction')->name('notice');
    Route::get('email/verify/{id}/{hash}', 'VerifyAction')->name('verify');
});

Route::name('user.')->namespace('User')->middleware('verified')->group(function () {
    Route::get('/home', 'ShowHomeAction')->name('home');
    Route::prefix('/users')->group(function () {
        Route::get('/', 'IndexUserAction')->name('index');
        Route::prefix('/{uuid}')->group(function () {
            Route::get('/', 'ShowUserAction')->name('show');
            Route::get('/edit', 'EditUserAction')->name('edit');
            Route::put('/', 'UpdateUserAction')->name('update');
        });
    });
});
