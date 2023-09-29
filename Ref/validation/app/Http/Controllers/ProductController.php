<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function save(ValidationProduct $validateProductRequest)
    {
        $product = new Product();
        $product->name = $validateProductRequest->name;
        $product->description = $validateProductRequest->description;
        $product->category_id = $validateProductRequest->category_id;
        $product->price = $validateProductRequest->price;


        $product->save();
        return redirect()->route('products.index')->with("msg", "Add product success")->with('msgAction', 'success');
    }

    public function edit($id = 0)
    {
        $categories = Category::all();
        $product = null;
        if (!empty($id)) {
            $product = Product::where('id', $id)->first();
            if ($product == null) {
                return redirect()->route('products.index')->with("msg", "Product not found")->with('msgAction', 'error');
            } else {
                return view('products.edit', compact('product', 'categories'));
            }
        } else {
            return redirect()->route('products.index')->with("msg", "Id Product not valid")->with('msgAction', 'error');
        }
    }
    public function update(ValidationProduct $request, $id)
    {
        $product = null;
        if (!empty($id)) {
            $product = Product::where('id', $id)->first();
            if ($product == null) {
                return redirect()->route('products.index')->with("msg", "Product not found")->with('msgAction', 'error');
            } else {
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category_id;

                $product->save();
                return redirect()->route('products.index')->with("msg", "Edit Product success")->with('msgAction', 'success');
            }
        } else {
            return redirect()->route('products.index')->with("msg", "Id Product not valid")->with('msgAction', 'error');
        }
    }
}
