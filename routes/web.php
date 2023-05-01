<?php

use Illuminate\Support\Facades\Route;
use App\View\Components\ImageUploader;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\CountryController;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/login', function () {
    return view('web.auth.login');
})->name('login');

Route::get('/lang/{lang}', LanguageController::class)->name('switchLang');

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::post('countries/related-cities', [CountryController::class, 'relatedCities'])->name('relatedCities');

    Route::post('upload-image', [ImageUploader::class, 'uploadImage']);
    Route::post('delete-image', [ImageUploader::class, 'deleteImage'])->name('deleteImage');
});
