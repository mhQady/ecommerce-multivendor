<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\HomeController;
use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\Vendor\Auth\RegisterController;


Route::middleware('guest:vendor')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth:vendor')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});