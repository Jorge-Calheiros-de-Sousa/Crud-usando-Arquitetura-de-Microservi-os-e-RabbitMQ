<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryContract
{
    public function paginateWithSearch(string $search, string $field, $perPage, int $limit = 20): LengthAwarePaginator;
    public function findOrFail(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function trash(int $id);
    public function restore(int $id);
    public function forceDelete(int $id);
    public function resolveModel();
}
