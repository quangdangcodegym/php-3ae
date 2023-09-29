<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductNotFoundException;
use App\Http\Requests\ValidationProduct;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductiController extends Controller
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
        return view('productsi.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('productsi.create', compact('categories'));
    }
    public function save(ValidationProduct $validateProductRequest)
    {
        $product = new Product();
        $product->name = $validateProductRequest->name;
        $product->description = $validateProductRequest->description;
        $product->category_id = $validateProductRequest->category_id;
        $product->price = $validateProductRequest->price;
        // $product->user_created_id = $validateProductRequest->user()->id;
        // $product->user_updated_id = $validateProductRequest->user()->id;
        $product->user_created_id = 1;
        $product->user_updated_id = 1;

        $this->productService->updateProduct($product);
        return redirect()->route('productsi.index')->with("msg", "Add product success")->with('msgAction', 'success');
    }

    public function edit($id = 0, Request $request)
    {

        $categories = Category::all();
        $product = null;
        if (!empty($id)) {
            $product = $this->productService->findProductById($id);
            if ($product == null) {
                return redirect()->route('productsi.index')->with("msg", "Product not found")->with('msgAction', 'error');
            } else {
                return view('productsi.edit', compact('product', 'categories'));
            }
        } else {
            return redirect()->route('productsi.index')->with("msg", "Id Product not valid")->with('msgAction', 'error');
        }
    }
    public function update(ValidationProduct $request, $id)
    {
        $product = null;
        if (!empty($id)) {
            $product = $this->productService->findProductById($id);
            if ($product == null) {
                return redirect()->route('productsi.index')->with("msg", "Product not found")->with('msgAction', 'error');
            } else {
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->category_id = $request->category_id;

                $this->productService->updateProduct($product);
                return redirect()->route('productsi.index')->with("msg", "Edit Product success")->with('msgAction', 'success');
            }
        } else {
            return redirect()->route('productsi.index')->with("msg", "Id Product not valid")->with('msgAction', 'error');
        }
    }

    public function destroy($id)
    {
        $product = $this->productService->findProductById($id);
        if (Gate::allows('edit-product', $product)) {
            $product->delete();
            abort(200);
        } else {
            abort(404);
        }
    }
}
