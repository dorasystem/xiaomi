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
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService) {}

    public function duplicate(int $id, ProductService $service)
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

    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->get();

        $query = Product::query();

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name_uz', 'like', "%{$search}%")
                    ->orWhere('name_ru', 'like', "%{$search}%")
                    ->orWhere('name_en', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }

        $products = $query->latest()->paginate(20);
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

        $this->productService->createProduct($productData);

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
