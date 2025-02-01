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
        $descImages = DescImage::with('product')
            ->orderBy('created_at', 'desc') // Eng oxirgi qo'shilganlarni birinchi chiqarish
            ->paginate(10);

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
            'images.*.image' => 'nullable|file|mimes:jpeg,png,jpg',
            'images.*.description_uz' => 'nullable|string',
            'images.*.description_ru' => 'nullable|string',
            'images.*.description_en' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg', // Asosiy rasm uchun
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $product = DescImage::findOrFail($id);

        if (!empty($request->images)) {
            // Agar yangi `images` kelgan bo‘lsa, ularni qayta ishlaymiz
            foreach ($request->images as $index => $imageData) {
                $existingImage = DescImage::where('product_id', $product->product_id)->skip($index)->first();

                $path = isset($imageData['image'])
                    ? $imageData['image']->store('products', 'public')
                    : ($existingImage ? $existingImage->image : $product->image);

                if ($existingImage) {
                    $existingImage->update([
                        'image' => $path,
                        'description_uz' => $imageData['description_uz'] ?? $existingImage->description_uz,
                        'description_ru' => $imageData['description_ru'] ?? $existingImage->description_ru,
                        'description_en' => $imageData['description_en'] ?? $existingImage->description_en,
                    ]);
                } else {
                    DescImage::create([
                        'product_id' => $product->product_id,
                        'image' => $path,
                        'description_uz' => $imageData['description_uz'] ?? null,
                        'description_ru' => $imageData['description_ru'] ?? null,
                        'description_en' => $imageData['description_en'] ?? null,
                    ]);
                }
            }
        } else {
            // Agar `images` kelmasa, mavjud ma'lumotlarni **o‘zgartirish**
            $updateData = [
                'description_uz' => $request->description_uz ?? $product->description_uz,
                'description_ru' => $request->description_ru ?? $product->description_ru,
                'description_en' => $request->description_en ?? $product->description_en,
            ];

            // Agar **asosiy `image` yuklangan bo‘lsa**, uni ham yangilaymiz
            if ($request->hasFile('image')) {
                $updateData['image'] = $request->file('image')->store('products', 'public');
            }

            // Faqat o‘zgargan maydonlarni **update** qilish
            $product->update($updateData);
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

        return redirect()->route('desc-images.index')->with('success', 'Изображения успешно обновлены.');
    }

}
