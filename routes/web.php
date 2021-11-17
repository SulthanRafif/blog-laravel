<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get('/', HomeController::class);

Auth::routes();

Route::middleware('auth')->group(function() {

    Route::group(['middleware' => 'admin'], function() {
        Route::get('admin', [AdminController::class, 'index']);
    });

    Route::group(['middleware' => 'user'], function() {
        Route::resource('blogs', BlogController::class);
    });
    
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']); 

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

