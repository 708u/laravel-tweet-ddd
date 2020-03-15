<?php

use Illuminate\Support\Facades\Auth;
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

Route::name('frontend.')->namespace('Frontend')->group(function () {
    Route::name('static.')->group(function () {
        Route::view('/', 'frontend.static.home')->name('home');
        Route::view('/about', 'frontend.static.about')->name('about');
        Route::view('/help', 'frontend.static.help')->name('help');
    });

    Route::name('auth.')->namespace('Auth')->group(function() {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
    });
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
