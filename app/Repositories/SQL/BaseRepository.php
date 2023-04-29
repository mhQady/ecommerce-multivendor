<?php

namespace App\Repositories\SQL;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\BaseContract;


abstract class BaseRepository implements BaseContract
{
    protected $model;
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

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
    ) {
        $query = $this->model;

        if ($applyOrder) {
            $query = $query->orderBy($orderBy, $orderDir);
        }

        if ($applyFilter) {
            $query = $query->filter();
        }

        if (!empty($relations)) {
            $query = $query->with($relations);
        }

        if ($doesntHave) {
            $query = $query->doesntHave($doesntHave);
        }

        if ($condition['key']) {
            $query = $query->where($condition['key'], $condition['value']);
        }

        if (!empty($relationCount)) {
            $query = $query->withCount($relationCount);
        }

        if ($numberElements) {
            $query->take($numberElements);
        }

        if ($pagination) {
            return $query->paginate($pagination, $fields);
        }

        return $query->get($fields);
    }

    public function find(int $id, array $relations = [])
    {
        $query = $this->model;

        if (!empty($relations)) {
            $query = $query->with($relations);
        }

        return $query->findOrFail($id);
    }

    public function remove($model)
    {
        if (!$model instanceof Model) {
            $model = $this->find($model);
        }

        // Check if has relations
        // foreach ($model->getDefinedRelations() as $relation) {
        //     if ($model->$relation()->count()) {
        //         throw new CantDeleteModelException(__("messages.responses.Can not delete, model has related records"));
        //     }
        // }

        return $model->delete();
    }
}