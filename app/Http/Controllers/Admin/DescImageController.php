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
    public function index()
    {
        $descImages = DescImage::with('product')->paginate(10);
        return view('admin.desc_images.index', compact('descImages'));
    }
    public function create()
    {
        $products = Product::all();
        return view('admin.desc_images.create', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'images.image.*' => 'required|file|mimes:jpeg,png,jpg,webp,svg,gif|max:2048',
            'images.description_uz.*' => 'nullable|string',
            'images.description_ru.*' => 'nullable|string',
            'images.description_en.*' => 'nullable|string',
        ]);

        foreach ($request->images['image'] as $key => $image) {
            $path = $image->store('products', 'public');

            DescImage::create([
                'product_id' => $request->product_id,
                'image' => $path,
                'description_uz' => $request->images['description_uz'][$key] ?? null,
                'description_ru' => $request->images['description_ru'][$key] ?? null,
                'description_en' => $request->images['description_en'][$key] ?? null,
            ]);
        }

        return redirect()->route('desc-images.index')->with('success', 'Изображения успешно добавлены.');
    }

    public function edit(DescImage $descImage)
    {
        $products = Product::all();
        return view('admin.desc_images.edit', compact('descImage', 'products'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'images.image.*' => 'nullable|file|mimes:jpeg,png,jpg',
            'images.description_uz.*' => 'nullable|string',
            'images.description_ru.*' => 'nullable|string',
            'images.description_en.*' => 'nullable|string',
        ]);

        $product = DescImage::findOrFail($id);

        foreach ($request->images['image'] ?? [] as $index => $image) {
            $existingImage = $product->images[$index] ?? null;

            if ($image) {
                $path = $image->store('products', 'public');
            } else {
                $path = $existingImage->image ?? null;
            }

            if ($existingImage) {
                $existingImage->update([
                    'image' => $path,
                    'description_uz' => $request->images['description_uz'][$index] ?? $existingImage->description_uz,
                    'description_ru' => $request->images['description_ru'][$index] ?? $existingImage->description_ru,
                    'description_en' => $request->images['description_en'][$index] ?? $existingImage->description_en,
                ]);
            } else {
                DescImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'description_uz' => $request->images['description_uz'][$index] ?? null,
                    'description_ru' => $request->images['description_ru'][$index] ?? null,
                    'description_en' => $request->images['description_en'][$index] ?? null,
                ]);
            }
        }

        return redirect()->route('desc-images.index')->with('success', 'Изображения успешно обновлены.');
    }

    public function destroy($id)
    {
        $image = DescImage::findOrFail($id);

        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return response()->json(['success' => true]);
    }

}
