<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Add this import
class ProductController extends Controller
{
    public function deleteVariant($id)
    {
        // Variantni topish
        $variant = Variant::find($id);

        if (!$variant) {
            return response()->json(['success' => false, 'message' => 'Variant topilmadi']);
        }

        // Variantni o'chirish
        $variant->delete();

        return response()->json(['success' => true]);
    }

    // Display list of products
    public function index()
    {
        $products = Product::orderBy('id','desc')->get(); // You can paginate or filter this based on requirements
        return view('admin.products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        $categories = Category::all(); // Get categories to display in the form
        return view('admin.products.create', compact('categories'));
    }

    // Store a newly created product in the database

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
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'color_uz' => 'nullable|string',
            'color_ru' => 'nullable|string',
            'color_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp', // multiple image validation
            'gift_name_uz' => 'nullable|string',
            'gift_name_ru' => 'nullable|string',
            'gift_name_en' => 'nullable|string',
            'gift_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp',
            'storage' => 'nullable|array',
            'price' => 'nullable|array',
            'discount_price' => 'nullable|array',
            'price_6' => 'nullable|array',
            'price_12' => 'nullable|array',
            'price_24' => 'nullable|array',
            'sku' => 'nullable|array',
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
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,
            'color_uz' => $request->color_uz,
            'color_ru' => $request->color_ru,
            'color_en' => $request->color_en,
            'image' => $primaryImagePath,
            'images' => $additionalImages, // Store array of image paths directly
            'gift_name_uz' => $request->gift_name_uz,
            'gift_name_ru' => $request->gift_name_ru,
            'gift_name_en' => $request->gift_name_en,
            'gift_image' => $giftImagePath,
            'popular' => $request->has('popular'),
        ]);

        // Generate and set the slug
        $slug = Str::slug($request->name_en) . '-' . $product->id; // Combine name and id to create slug
        $product->slug = $slug;
        $product->save(); // Save the product again to store the slug

        // Store variants (pricing and storage details)
        if ($request->has('storage')) {
            foreach ($request->storage as $index => $storage) {
                Variant::create([
                    'product_id' => $product->id,
                    'storage' => $storage,
                    'price' => $request->price[$index] ?? null,
                    'discount_price' => $request->discount_price[$index] ?? null,
                    'price_6' => $request->price_6[$index] ?? null,
                    'price_12' => $request->price_12[$index] ?? null,
                    'price_24' => $request->price_24[$index] ?? null,
                    'sku' => $request->sku[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }






    // Display a specific product
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // Show the form to edit a product
    public function edit(Product $product)
    {
        $categories = Category::all(); // Get categories to display in the form
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update a product in the database

    public function update(Request $request, Product $product)
    {
        // Validate form data
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name_uz' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'color_uz' => 'nullable|string',
            'color_ru' => 'nullable|string',
            'color_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'edit_images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'deleted_images' => 'nullable|array',
            'gift_name_uz' => 'nullable|string',
            'gift_name_ru' => 'nullable|string',
            'gift_name_en' => 'nullable|string',
            'gift_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'storage' => 'nullable|array',
            'price' => 'nullable|array',
            'discount_price' => 'nullable|array',
            'price_6' => 'nullable|array',
            'price_12' => 'nullable|array',
            'price_24' => 'nullable|array',
            'sku' => 'nullable|array',
            'deleted_variants' => 'nullable|array',
        ]);

        // Handle main product image
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        // Handle gift image
        if ($request->hasFile('gift_image')) {
            if ($product->gift_image) {
                Storage::delete($product->gift_image);
            }
            $product->gift_image = $request->file('gift_image')->store('gift_images', 'public');
        }

        // Process images array
        $images = is_string($product->images) ? json_decode($product->images, true) : [];

        // Handle deleted images
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $deletedImage) {
                if (($key = array_search($deletedImage, $images)) !== false) {
                    Storage::delete($deletedImage);
                    unset($images[$key]);
                }
            }
        }

        // Handle edited images
        if ($request->hasFile('edit_images')) {
            foreach ($request->file('edit_images') as $key => $newImage) {
                if (isset($images[$key])) {
                    // Delete the old image if it exists
                    Storage::delete($images[$key]);
                    // Store the new image
                    $images[$key] = $newImage->store('products', 'public');
                }
            }
        }

        // Handle new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products', 'public');
            }
        }

        // Update the images in the product
        $product->images = json_encode(array_values($images));

        // Update product details
        $product->update([
            'category_id' => $validatedData['category_id'],
            'slug' => Str::slug($validatedData['name_uz']) . '-' . $product->id, // Update slug here
            'name_uz' => $validatedData['name_uz'],
            'name_ru' => $validatedData['name_ru'],
            'name_en' => $validatedData['name_en'],
            'description_uz' => $validatedData['description_uz'],
            'description_ru' => $validatedData['description_ru'],
            'description_en' => $validatedData['description_en'],
            'content_uz' => $validatedData['content_uz'],
            'content_ru' => $validatedData['content_ru'],
            'content_en' => $validatedData['content_en'],
            'color_ru' => $validatedData['color_ru'],
            'gift_name_uz' => $validatedData['gift_name_uz'],
            'gift_name_ru' => $validatedData['gift_name_ru'],
            'gift_name_en' => $validatedData['gift_name_en'],
            'popular' => $request->has('popular'),
        ]);

        $slug = Str::slug($request->name_en) . '-' . $product->id; // Combine name and id to create slug
        $product->slug = $slug;
        // Handle deleted variants
        if ($request->has('deleted_variants')) {
            Variant::whereIn('id', $validatedData['deleted_variants'])->delete();
        }


        // Save new or updated variants
        if ($request->has('storage')) {
            foreach ($request->storage as $index => $storage) {
                $variant = new Variant([
                    'product_id' => $product->id,
                    'storage' => $storage,
                    'price' => $request->price[$index] ?? null,
                    'discount_price' => $request->discount_price[$index] ?? null,
                    'price_6' => $request->price_6[$index] ?? null,
                    'price_12' => $request->price_12[$index] ?? null,
                    'price_24' => $request->price_24[$index] ?? null,
                    'sku' => $request->sku[$index] ?? null,
                ]);

                $variant->save();
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }



    // Delete a product
    public function destroy(Product $product)
    {
        // Delete associated images from storage
        Storage::delete($product->image);
        Storage::delete($product->gift_image);

        // Delete all variants associated with the product
        Variant::where('product_id', $product->id)->delete();

        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
