<?php

namespace App\Repositories\SQL;

use App\Models\Brand;
use App\Repositories\Contracts\BrandContract;



class BrandRepository extends BaseRepository implements BrandContract
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
}