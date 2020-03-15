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
    Route::get('/login', 'ShowLoginFormAction')->name('login');
    Route::post('/login', 'LoginAction');
    Route::post('/logout', 'LogoutAction')->name('logout');
});

Route::name('user.')->namespace('User')->group(function () {
    Route::get('/home', 'ShowHomeAction')->name('home');
});
