<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, [1, 2])) {
            abort(403, 'Ushbu sahifaga kirish ruxsati yo‘q.');
        }
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'date' => 'nullable|string',
            'status' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8192',
        ]);

        try {

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('blogs_photo', 'public');
            }

            $uploadedImages = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $uploadedImages[] = $image->store('blogs_images', 'public');
                }
            }


            $data['images'] = $uploadedImages;

            Blog::create($data);

            return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'date' => 'nullable|string',
            'status' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8192',
            'delete_images' => 'nullable|array',
        ]);

        try {
            // Eski rasmlarni o'chirish
            $updatedImages = $blog->images ?? [];
            if ($request->filled('delete_images')) {
                foreach ($request->delete_images as $deleteImage) {
                    if (($key = array_search($deleteImage, $updatedImages)) !== false) {
                        unset($updatedImages[$key]);
                        Storage::disk('public')->delete($deleteImage);
                    }
                }
                $updatedImages = array_values($updatedImages); // Qayta indekslash
            }

            // Yangi rasmlarni qo'shish
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $updatedImages[] = $image->store('blogs_images', 'public');
                }
            }

            // Yangilangan rasmlarni saqlash
            $data['images'] = $updatedImages;

            // Blogni yangilash
            $blog->update($data);

            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }



    public function destroy(Blog $blogs)
    {
        if ($blogs->image) {
            Storage::disk('public')->delete($blogs->image);
        }

        $blogs->delete();

        return redirect()->back()->with('success', 'Blogs deleted successfully.');
    }
}
