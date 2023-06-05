<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;


interface BaseContract
{
    public const ORDER_BY = 'id';

    public const ORDER_DIR = 'desc';

    public function findAll(
        $fields = ['*'],
        $applyOrder = true,
        $orderBy = self::ORDER_BY,
        $orderDir = self::ORDER_DIR,
        string $doesntHave = null,
        array $relations = [],
        array $relationCount = [],
        int $pagination = 0,
        bool $applyFilter = false,
        int $numberElements = 0,
        array $condition = ['key' => null, 'value' => null],
    );
    public function create(array $attributes = []);
    public function update(Model $model, array $attributes = []);
    public function remove(Model $model);
    public function find(int $id, array $relations = []);
}