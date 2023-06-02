<?php

namespace App\Repositories\SQL;

use App\Models\Product;
use App\Repositories\Contracts\ProductContract;



class ProductRepository extends BaseRepository implements ProductContract
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}