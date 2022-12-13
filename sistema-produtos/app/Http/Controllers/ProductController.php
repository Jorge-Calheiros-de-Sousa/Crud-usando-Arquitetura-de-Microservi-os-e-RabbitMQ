<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->list();
    }

    public function show($id)
    {
        return $this->repository->findOrFail($id);
    }

    public function store(Request $request)
    {
        $product = $this->repository->create($request->only(['title', 'price', 'imageurl']));

        ProductCreated::dispatch($product)->onQueue('main_queue');

        return response($product, Response::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $product = $this->repository->update($id, $request->only(['title', 'price', 'imageurl']));

        ProductUpdated::dispatch($product)->onQueue('main_queue');

        return response($product, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $this->repository->trash($id);

        ProductDeleted::dispatch($id)->onQueue('main_queue');

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
