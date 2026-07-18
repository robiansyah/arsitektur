<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/profil', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::post('/profil/ubah-password/', [App\Http\Controllers\UserController::class, 'password'])->name('user.password');
    Route::post('/profil/ubah-data/', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});