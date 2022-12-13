<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_products()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $response = $this->post('/api/products', [
            "title" => "Api test",
            "price" => 9.99,
            "imageurl" => "image"
        ]);
        $response->assertStatus(201);
    }
}
