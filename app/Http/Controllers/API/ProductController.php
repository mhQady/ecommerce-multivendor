<?php

namespace App\Http\Controllers\API;

use App\Enums\Product\ProductStatus;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    public function getStatusesList(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => ProductStatus::cases(),
        ]);
    }
}