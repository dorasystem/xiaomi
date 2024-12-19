<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Variant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VariantController extends Controller
{
    public function index()
    {
        $variants = Variant::with('product')->get();
        return view('admin.variants.index', compact('variants'));
    }

    public function show($id)
    {
        $variant = Variant::with('product')->findOrFail($id);
        return view('admin.variants.show', compact('variant'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.variants.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'storage' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'color_uz' => 'nullable|string|max:255',
            'color_ru' => 'nullable|string|max:255',
            'color_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_price' => 'nullable',
            'price_3' => 'nullable',
            'price_6' => 'nullable',
            'price_12' => 'nullable',
            'price_24' => 'nullable',
        ]);


        if ($request->hasFile('image')) {
            $primaryImagePath = $request->file('image')->store('variants', 'public');
        }

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('variants', 'public');
            }
        }

        $variant = Variant::create([
            'product_id' => $request->product_id,
            'storage' => $request->storage,
            'ram' => $request->ram,
            'price' => $request->price,
            'color_uz' => $request->color_uz,
            'color_ru' => $request->color_ru,
            'color_en' => $request->color_en,
            'image' => isset($primaryImagePath) ? $primaryImagePath : null,
            'images' => $imagePaths,
            'discount_price' => $request->discount_price,
            'price_3' => $request->price_3,
            'price_6' => $request->price_6,
            'price_12' => $request->price_12,
            'price_24' => $request->price_12,
        ]);

        return redirect()->route('variants.index')->with('success', 'Variant muvaffaqiyatli yaratildi.');
    }


    public function edit($id)
    {
        $variant = Variant::findOrFail($id);
        $products = Product::all();
        return view('admin.variants.edit', compact('variant', 'products'));
    }

    public function update(Request $request, $id)
    {
        $variant = Variant::findOrFail($id);

        $request->validate([
            'storage' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'color_uz' => 'nullable|string|max:255',
            'color_ru' => 'nullable|string|max:255',
            'color_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Primary image
            'images' => 'nullable|array', // Multiple images
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation for each file
            'discount_price' => 'nullable',
            'price_3' => 'nullable',
            'price_6' => 'nullable',
            'price_12' => 'nullable',
            'price_24' => 'nullable',
        ]);


        if ($request->hasFile('image')) {
            if ($variant->image && file_exists(storage_path('app/public/' . $variant->image))) {
                unlink(storage_path('app/public/' . $variant->image));
            }

            $primaryImagePath = $request->file('image')->store('variants', 'public');
            $variant->image = $primaryImagePath;
        }

        $imagePaths = $variant->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('variants', 'public');
            }
        }

        if ($request->has('image_delete')) {
            foreach ($request->image_delete as $imagePath) {
                Storage::delete($imagePath);
                $imagePaths = array_diff($imagePaths, [$imagePath]); // Remove from array
            }
        }

        if ($request->has('image_edit')) {
            foreach ($request->file('image_edit') as $index => $newImage) {
                if ($newImage) {
                    $newImagePath = $newImage->store('variants', 'public'); // Save new image
                    $imagePaths[$index] = $newImagePath; // Replace old image
                }
            }
        }

        $variant->update([
            'storage' => $request->storage,
            'ram' => $request->ram,
            'price' => $request->price,
            'color_uz' => $request->color_uz,
            'color_ru' => $request->color_ru,
            'color_en' => $request->color_en,
            'image' => $variant->image,
            'images' => $imagePaths,
            'discount_price' => $request->discount_price,
            'price_3' => $request->price_3,
            'price_6' => $request->price_6,
            'price_12' => $request->price_12,
            'price_24' => $request->price_24,
        ]);

        return redirect()->route('variants.index')->with('success', 'Variant muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        return redirect()->route('variants.index')->with('success', 'Variant muvaffaqiyatli o\'chirildi.');
    }
}
