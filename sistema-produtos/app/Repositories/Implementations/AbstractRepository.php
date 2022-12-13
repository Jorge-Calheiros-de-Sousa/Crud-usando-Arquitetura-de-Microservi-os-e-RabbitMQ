<?php

namespace App\Repositories\Implementations;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function list()
    {
        return $this->model->all();
    }

    public function findOrFail(int $id): array
    {
        return $this->model->where("id", $id)->get();
    }

    public function create(array $data)
    {
        $model = $this->model->fill($data)->save();
        return $model ? $this->model->toArray() : $model;
    }
    public function update(int $id, array $data)
    {
        $model = $this->model->findOrFail($id);
        $model = $model->fill($data)->save();
        return $model ? $this->model->toArray() : $model;
    }
    public function trash(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function restore(int $id)
    {
        return $this->model->withTrashed()->findOrFail($id)->restore();
    }

    public function forceDelete(int $id)
    {
        return $this->model->withTrashed()->findOrFail($id)->forceDelete();
    }

    public function resolveModel()
    {
        return app($this->model);
    }
}
