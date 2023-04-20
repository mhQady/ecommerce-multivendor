<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/login', function () {
    return view('web.auth.login');
})->name('login');

Route::get('/lang/{lang}', LanguageController::class)->name('switchLang');