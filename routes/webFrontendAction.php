<?php

use Illuminate\Support\Facades\Route;

Route::name('static.')->group(function () {
    Route::view('/', 'frontend.static.home')->name('home')->middleware('guest');
    Route::view('/about', 'frontend.static.about')->name('about');
    Route::view('/help', 'frontend.static.help')->name('help');
});

Route::name('user.')->namespace('User')->group(function () {
    Route::get('/home', 'ShowHomeAction')->name('home');
});
