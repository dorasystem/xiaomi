<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainBanner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainBannerController extends Controller
{
    public function edit(MainBanner $mainBanner)
    {
        $products = Product::all(); // Barcha mahsulotlarni olish
        return view('admin.main_banners.edit', compact('mainBanner', 'products'));
    }

    public function update(Request $request, MainBanner $mainBanner)
    {
        $request->validate([
            'images.uz.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.ru.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.en.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'product_ids.uz' => 'nullable|array',
            'product_ids.ru' => 'nullable|array',
            'product_ids.en' => 'nullable|array',
            'product_ids.uz.*' => 'nullable|exists:products,id',
            'product_ids.ru.*' => 'nullable|exists:products,id',
            'product_ids.en.*' => 'nullable|exists:products,id',
        ]);

        // 🔹 Rasm va mahsulot ID larini olish yoki bo'sh qilish
        $updatedImages = $mainBanner->images ?? ['uz' => [], 'ru' => [], 'en' => []];
        $updatedProductIds = $request->input('product_ids', ['uz' => [], 'ru' => [], 'en' => []]);

        // ❌ DELETE: Rasm o‘chirish
        $deleteImages = json_decode($request->input('delete_images', '{}'), true);

        if (!empty($deleteImages)) {
            foreach (['uz', 'ru', 'en'] as $lang) {
                if (isset($deleteImages[$lang])) {
                    foreach ($deleteImages[$lang] as $deleteImage) {
                        // Rasm `updatedImages[$lang]` da bormi tekshiramiz
                        if (($key = array_search($deleteImage, $updatedImages[$lang])) !== false) {
                            unset($updatedImages[$lang][$key]); // Massivdan olib tashlash
                            unset($updatedProductIds[$lang][$key]); // Tegishli mahsulot ID ni ham olib tashlash

                            // Fayl mavjudligini tekshirib, keyin o‘chirish
                            if (Storage::disk('public')->exists($deleteImage)) {
                                Storage::disk('public')->delete($deleteImage);
                            }
                        }
                    }
                    // 🔹 Massiv indekslarini qayta tartiblash
                    $updatedImages[$lang] = array_values($updatedImages[$lang]);
                    $updatedProductIds[$lang] = array_values($updatedProductIds[$lang]);
                }
            }
        }

        // ✅ ADD: Yangi yuklangan rasmlarni qo‘shish
        foreach (['uz', 'ru', 'en'] as $lang) {
            if ($request->hasFile("images.$lang")) {
                foreach ($request->file("images.$lang") as $index => $image) {
                    $updatedImages[$lang][] = $image->store('main_banners', 'public');
                    $updatedProductIds[$lang][] = $request->input("product_ids.$lang")[$index] ?? null;
                }
            }
        }

        // ✅ IMAGE1 UPDATE
        $image1Path = $request->file('image1')
            ? $request->file('image1')->store('main_banners', 'public')
            : $mainBanner->image1;
        if ($request->hasFile('image1') && $mainBanner->image1) {
            Storage::disk('public')->delete($mainBanner->image1);
        }

        // ✅ IMAGE2 UPDATE
        $image2Path = $request->file('image2')
            ? $request->file('image2')->store('main_banners', 'public')
            : $mainBanner->image2;
        if ($request->hasFile('image2') && $mainBanner->image2) {
            Storage::disk('public')->delete($mainBanner->image2);
        }

        // 🔄 UPDATE: Ma'lumotlarni yangilash
        $mainBanner->update([
            'images' => $updatedImages,
            'product_ids' => $updatedProductIds,
            'image1' => $image1Path,
            'image2' => $image2Path,
        ]);

        return redirect()->back()->with('success', 'Banner muvaffaqiyatli yangilandi!');
    }




    public function destroy(MainBanner $mainBanner)
    {
        // Barcha rasmlarni o‘chirish
        if (is_array($mainBanner->images)) {
            foreach ($mainBanner->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        // Image1 va Image2 ni ham o‘chirish
        if ($mainBanner->image1) {
            Storage::disk('public')->delete($mainBanner->image1);
        }
        if ($mainBanner->image2) {
            Storage::disk('public')->delete($mainBanner->image2);
        }

        $mainBanner->delete(); // Bannerni o‘chirish

        return redirect()->back()->with('success', 'Banner muvaffaqiyatli o‘chirildi!');
    }
}
