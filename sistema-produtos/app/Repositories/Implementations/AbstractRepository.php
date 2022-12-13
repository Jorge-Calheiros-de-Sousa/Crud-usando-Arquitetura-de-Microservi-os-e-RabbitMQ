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

    public function paginateWithSearch(string $search, string $field, $perPage, int $limit = 20): LengthAwarePaginator
    {
        $mainQuery = $this->model->when($search, function ($query) use ($field, $search) {
            $query->where("$field", "like", "%$search%");
        });

        if ($perPage) {
            return $mainQuery->paginate($perPage);
        }
        return $mainQuery->limit($limit)->get();
    }
    public function findOrFail(int $id): array
    {
        return $this->model->where("id", $id)->get();
    }
    public function create(array $data)
    {
        $model = $this->model->fill($data)->save();
        return $model ? $model->attributesToArray() : $model;
    }
    public function update(int $id, array $data)
    {
        $model = $this->model->findOrFail($id);
        $model = $model->fill($data)->save();
        return $model ? $model->attributesToArray() : $model;
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
