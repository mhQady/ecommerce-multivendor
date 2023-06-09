<?php

use App\Http\Controllers\API\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('products/statuses', [productController::class, 'getStatusesList']);
Route::get('products/types', [productController::class, 'getTypesList']);
