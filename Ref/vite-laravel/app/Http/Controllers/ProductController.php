<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductNotFoundException;
use App\Http\Requests\ValidationProduct;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getAll();
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


        $this->productService->updateProduct($product);
        return redirect()->route('products.index')->with("msg", "Add product success")->with('msgAction', 'success');
    }

    public function edit($id = 0)
    {
        $categories = Category::all();
        $product = null;
        if (!empty($id)) {
            $product = $this->productService->findProductById($id);
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
            $product = $this->findProductById($id);
            if ($product == null) {
                return redirect()->route('products.index')->with("msg", "Product not found")->with('msgAction', 'error');
            } else {
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category_id;

                $this->productService->updateProduct($product);
                return redirect()->route('products.index')->with("msg", "Edit Product success")->with('msgAction', 'success');
            }
        } else {
            return redirect()->route('products.index')->with("msg", "Id Product not valid")->with('msgAction', 'error');
        }
    }
}
