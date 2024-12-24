<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\DescImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DescImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $descImages = DescImage::with('product')->paginate(10);
        return view('admin.desc_images.index', compact('descImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.desc_images.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {

        foreach ($request->images['image'] as $key => $image) {
            // Handle image upload
            $imagePath = $image->store('desc_images', 'public');

            // Save image and descriptions in the database
          DescImage::create([
                'product_id' => $request->product_id,
                'image' => $imagePath,  // Save image path
                'description_uz' => $request->images['description_uz'][$key] ?? null,  // Uzbek description
                'description_ru' => $request->images['description_ru'][$key] ?? null,  // Russian description
                'description_en' => $request->images['description_en'][$key] ?? null,  // English description
            ]);
        }

        return redirect()->route('desc-images.index');
    }











    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DescImage $descImage)
    {
        $products = Product::all();
        return view('admin.desc_images.edit', compact('descImage', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DescImage $descImage)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description_uz' => 'nullable|string|max:500',
            'description_ru' => 'nullable|string|max:500',
            'description_en' => 'nullable|string|max:500',
        ]);

        // If a new image is uploaded, update the image
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($descImage->image && Storage::exists('public/' . $descImage->image)) {
                Storage::delete('public/' . $descImage->image);
            }

            // Store the new image
            $path = $request->file('image')->store('desc_images', 'public');
            $descImage->image = $path;
        }

        // Update the descriptions
        $descImage->product_id = $validated['product_id'];
        $descImage->description_uz = $validated['description_uz'] ?? $descImage->description_uz;
        $descImage->description_ru = $validated['description_ru'] ?? $descImage->description_ru;
        $descImage->description_en = $validated['description_en'] ?? $descImage->description_en;
        $descImage->save();

        return redirect()->route('desc-images.index')->with('success', 'Image and descriptions updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DescImage $descImage)
    {
        // Delete the image from storage
        if ($descImage->image && Storage::exists('public/' . $descImage->image)) {
            Storage::delete('public/' . $descImage->image);
        }

        // Delete the descImage record
        $descImage->delete();

        return redirect()->route('desc-images.index')->with('success', 'Image and description deleted successfully!');
    }
}
