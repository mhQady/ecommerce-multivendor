<?php

namespace App\Http\Controllers\API;

use App\Enums\Product\ProductType;
use App\Enums\Product\ProductStatus;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    public function getStatusesList()
    {
        return response()->json([
            'data' => ProductStatus::casesArray(),
        ]);
    }

    public function getTypesList()
    {
        return response()->json([
            'data' => ProductType::casesArray(),
        ]);
    }
}
