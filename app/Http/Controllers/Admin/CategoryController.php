<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'nullable|exists:categories,id',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('images/categories', 'public')
            : null;

        $category = new Category([
            'parent_id' => $request->parent_id,
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'image' => $imagePath,
        ]);

        // Slug avtomatik yaratish
        $category->slug = json_encode([
            'uz' => Str::slug($request->name_uz),
            'ru' => Str::slug($request->name_ru),
            'en' => Str::slug($request->name_en),
        ]);

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'parent_id' => 'nullable|exists:categories,id',
            'name_uz' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eski rasmni o‘chirish
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = $request->file('image')->store('images/categories', 'public');
        }

        // Kategoriya ma'lumotlarini yangilash
        $category->update([
            'parent_id' => $request->has('parent_id') ? $request->parent_id : $category->parent_id,
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
        ]);

        // Slug'ni yangilash
        $category->slug = json_encode([
            'uz' => Str::slug($request->name_uz ?? $category->name_uz),
            'ru' => Str::slug($request->name_ru ?? $category->name_ru),
            'en' => Str::slug($request->name_en ?? $category->name_en),
        ]);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Kategoriyada mahsulotlar bor-yo‘qligini tekshiramiz
        if ($category->products()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Bu kategoriyada mahsulotlar mavjud. O‘chirib bo‘lmaydi.');
        }

        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli o\'chirildi.');
    }
}
