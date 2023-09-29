<?php

namespace App\Http\Services;

use App\Exceptions\ProductNotFoundException;
use App\Models\Product;

class ProductService
{

    public function getAll()
    {
        return Product::all();
    }
    public function findProductById($id)
    {
        if ($id > 100) {
            throw new ProductNotFoundException('Not found product in the database');
        }
        return Product::where('id', $id)->first();
    }
    public function updateProduct($product)
    {
        $product->save();
    }
}
