<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\HomeController;
use App\Http\Controllers\Vendor\BrandController;
use App\Http\Controllers\Vendor\StoreController;
use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\Vendor\Auth\RegisterController;


Route::middleware('guest:vendor')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware(['auth:vendor', 'blocked'])->group(function () {
    Route::get('/home', HomeController::class)->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/stores/store', [StoreController::class, 'store'])->name('stores.store');

    Route::prefix('products')->group(function () {
        Route::resource('brands', BrandController::class)->except(['show']);
    });
});
