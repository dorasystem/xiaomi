<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService) {}

    public function duplicate($id, ProductService $service)
    {
        $service->duplicate($id);

        return redirect()->route('products.index')->with('success', 'Mahsulot va variantlari nusxalandi!');
    }

    public function deleteVariant($id)
    {
        $variant = Variant::find($id);

        if (!$variant) {
            return response()->json(['success' => false, 'message' => 'Variant topilmadi']);
        }

        $variant->delete();

        return response()->json(['success' => true]);
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $productData = new ProductData($request->validated());

        $this->productService->create($productData);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product, ProductService $service)
    {
        $data = ProductData::fromRequest($request);

        $service->update($product, $data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
