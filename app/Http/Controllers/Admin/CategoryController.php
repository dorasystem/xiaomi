<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/categories', 'public');
        }

        $category = Category::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'image' => $imagePath,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name_uz' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::exists($category->image)) {
                Storage::delete($category->image);
            }
            $category->image = $request->file('image')->store('images/categories', 'public');
        }

        $category->update($request->only([
            'name_uz',
            'name_ru',
            'name_en',
            'description_uz',
            'description_ru',
            'description_en'
        ]));

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image && Storage::exists($category->image)) {
            Storage::delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli o\'chirildi.');
    }
}

