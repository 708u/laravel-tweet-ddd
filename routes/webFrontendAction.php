<?php

use Illuminate\Support\Facades\Route;

Route::name('user.')->namespace('User')->group(function () {
    Route::get('/home', 'ShowHomeAction')->name('home');
});
