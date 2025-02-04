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
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'product_ids' => 'nullable|array',
            'product_ids.*' => 'nullable|exists:products,id', // Mahsulot mavjudligini tekshirish
        ]);


        // 🔹 Rasm array mavjud emas bo‘lsa, uni bo‘sh massiv qilish
        $updatedImages = is_array($mainBanner->images) ? $mainBanner->images : [];
        $updatedProductIds = $request->has('product_ids') ? $request->input('product_ids') : [];



        // ❌ DELETE: Agar rasm o‘chirilishi kerak bo‘lsa
        if ($request->has('delete_images') && !empty($request->delete_images)) {
            $deleteImages = json_decode($request->delete_images, true) ?? [];

            foreach ($deleteImages as $deleteImage) {
                if (($key = array_search($deleteImage, $updatedImages)) !== false) {
                    unset($updatedImages[$key]); // Massivdan olib tashlash
                    unset($updatedProductIds[$key]); // Tegishli mahsulot ID ni ham olib tashlash
                    Storage::disk('public')->delete($deleteImage); // Fizik faylni o‘chirish
                }
            }
        }

        // ✅ ADD: Yangi yuklangan rasmlarni qo‘shish va mahsulot ID larini bog‘lash
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $updatedImages[] = $image->store('main_banners', 'public');
                $updatedProductIds[] = $request->product_ids[$index] ?? null; // Agar mahsulot tanlanmagan bo‘lsa, null bo‘ladi
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
            'images' => array_values($updatedImages), // Massivni qayta indekslash
            'product_ids' => array_values($updatedProductIds), // Mahsulot ID larni ham yangilash
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
