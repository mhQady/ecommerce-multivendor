<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/login', function () {
    return view('web.auth.login');
})->name('login');

Route::get('/lang/{lang}', LanguageController::class)->name('switchLang');

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::post('countries/related-cities', [CountryController::class, 'relatedCities'])->name('relatedCities');
});