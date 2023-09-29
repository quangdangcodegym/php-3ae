<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationProduct;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use App\Services\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private IProductService $productService;
    public function __construct(IProductService $productService)
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
        // dd($validateProductRequest->all());          // Xem dữ liệu gửi về có đúng ko
        $this->productService->create($validateProductRequest->all());
        return redirect()->route('products.index')->with("msg", "Add product success")->with('msgAction', 'success');
    }


    public function edit($id = 0, Request $request)
    {

        $categories = Category::all();
        $product = null;
        if (!empty($id)) {
            $product = $this->productService->findById($id);
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
            $product = $this->productService->findById($id);
            if ($product == null) {
                return redirect()->route('products.index')->with("msg", "Product not found")->with('msgAction', 'error');
            } else {
                $this->productService->update($request->all(), $id);
                return redirect()->route('products.index')->with("msg", "Edit Product success")->with('msgAction', 'success');
            }
        } else {
            return redirect()->route('products.index')->with("msg", "Id Product not valid")->with('msgAction', 'error');
        }
    }

    public function destroy($id)
    {
        $product = $this->productService->destroy($id);
    }
}
