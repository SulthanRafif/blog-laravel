<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;

Route::get('/', HomeController::class);

Route::middleware('auth')->group(function() {
    Route::resource('blogs', BlogController::class);
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']); 

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

