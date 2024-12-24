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
        // Validate form data
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name_uz' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'color_uz' => 'nullable|string',
            'color_ru' => 'nullable|string',
            'color_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif', // multiple image validation
            'gift_name' => 'nullable|string',
            'gift_image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'storage' => 'nullable|array',
            'price' => 'nullable|array',
            'discount_price' => 'nullable|array',
            'price_3' => 'nullable|array',
            'price_6' => 'nullable|array',
            'price_12' => 'nullable|array',
            'price_24' => 'nullable|array',
        ]);

        // Handle image uploads
        $primaryImagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : null;
        $giftImagePath = $request->file('gift_image') ? $request->file('gift_image')->store('products', 'public') : null;

        // Handle multiple image uploads for 'images' field
        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('products', 'public');
            }
        }

        // Create the product
        $product = Product::create([
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->input('name_uz')),
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'color_uz' => $request->color_uz,
            'color_ru' => $request->color_ru,
            'color_en' => $request->color_en,
            'image' => $primaryImagePath,
            'images' => $additionalImages, // Store array of image paths directly
            'gift_name' => $request->gift_name,
            'gift_image' => $giftImagePath,
        ]);

        // Store variants (pricing and storage details)
        if ($request->has('storage')) {
            foreach ($request->storage as $index => $storage) {
                Variant::create([
                    'product_id' => $product->id,
                    'storage' => $storage,
                    'price' => $request->price[$index] ?? null,
                    'discount_price' => $request->discount_price[$index] ?? null,
                    'price_3' => $request->price_3[$index] ?? null,
                    'price_6' => $request->price_6[$index] ?? null,
                    'price_12' => $request->price_12[$index] ?? null,
                    'price_24' => $request->price_24[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Primary image
            'images' => 'nullable|array', // Multiple images
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Image validation for each file
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
