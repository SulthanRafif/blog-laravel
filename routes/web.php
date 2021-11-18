<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    
    Route::middleware('role:user')->resource('blogs', BlogController::class);
    
    Route::get('/dashboard', function(){
        return view('dashboard.index');
    });

    Route::middleware('role:admin')->get('admin', [AdminController::class, 'index'])->name('admin');
    
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']); 

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
