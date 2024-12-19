<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category', 'variants')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|unique:products',
            'name_uz' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description_uz' => 'nullable|string|max:255',
            'description_ru' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'gift_name' => 'nullable|string|max:255',
            'gift_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $giftImagePath = null;
        if ($request->hasFile('gift_image')) {
            $giftImagePath = $request->file('gift_image')->store('images/products', 'public');
        }

        $product = Product::create([
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'gift_name' => $request->gift_name,
            'gift_image' => $giftImagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli yaratildi.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'slug' => 'nullable|unique:products,slug,' . $product->id,
            'gift_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('gift_image')) {
            if ($product->gift_image && Storage::exists($product->gift_image)) {
                Storage::delete($product->gift_image);
            }
            $product->gift_image = $request->file('gift_image')->store('images/products', 'public');
        }

        $product->update($request->only(['category_id', 'slug', 'name_uz', 'name_ru', 'name_en', 'gift_name','description_uz', 'description_ru', 'description_en',]));

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gift_image && Storage::exists($product->gift_image)) {
            Storage::delete($product->gift_image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli o\'chirildi.');
    }
}
