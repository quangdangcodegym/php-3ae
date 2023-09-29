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
        $product = Product::where('id', $id)->first();
        if ($product == null) {
            throw new ProductNotFoundException('Not found product in the database');
        }
        return $product;
    }
    public function updateProduct($product)
    {
        $product->save();
    }
}
