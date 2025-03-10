<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, [1, 2])) {
            abort(403, 'Ushbu sahifaga kirish ruxsati yo‘q.');
        }
    }
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        // Ma'lumotlarni validatsiya qilish
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
            'date' => 'nullable|date',
            'status' => 'nullable|string|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('articles_photo', $filename, 'public');
            $data['image'] = $path;
        }

        $article = Article::create($data);

        $slug = Str::slug($request->title_en) . '-' . $article->id;
        $article->update(['slug' => $slug]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }


    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
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
            'status' => 'nullable|string' ?? 'active',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('articles_photo', $filename, 'public');
            $data['image'] = $path;
        }

        $article->update($data);
        $slug = Str::slug($request->title_en) . '-' . $article->id;
        $article->update(['slug' => $slug]);

        return redirect()->route('articles.index')->with('success', 'Articles updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->back()->with('success', 'Articles deleted successfully.');
    }
}
