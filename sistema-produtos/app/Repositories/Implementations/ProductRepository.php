<?php

namespace App\Repositories\Implementations;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;

class ProductRepository extends AbstractRepository implements ProductRepositoryContract
{
    protected $model = Product::class;
}
