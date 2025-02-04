<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::paginate(10);
        return view('admin.page_contents.index', compact('contents'));
    }

    public function edit(PageContent $pageContent)
    {
        return view('admin.page_contents.edit', compact('pageContent'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $data = $request->validate([
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image_uz' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_ru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_en' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_uz')) {
            Storage::delete('public/' . $pageContent->image_uz);
            $data['image_uz'] = $request->file('image_uz')->store('page_contents', 'public');
        }
        if ($request->hasFile('image_ru')) {
            Storage::delete('public/' . $pageContent->image_ru);
            $data['image_ru'] = $request->file('image_ru')->store('page_contents', 'public');
        }
        if ($request->hasFile('image_en')) {
            Storage::delete('public/' . $pageContent->image_en);
            $data['image_en'] = $request->file('image_en')->store('page_contents', 'public');
        }

        $pageContent->update($data);
        return redirect()->route('page_contents.index')->with('success', 'Content updated successfully');
    }

}

