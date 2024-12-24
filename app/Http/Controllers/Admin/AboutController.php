<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, [1, 2])) {
            abort(403, 'Ushbu sahifaga kirish ruxsati yo‘q.');
        }
    }

    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $request->validate([
            'about_or_company_uz' => 'nullable|string',
            'about_or_company_ru' => 'nullable|string',
            'about_or_company_en' => 'nullable|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($about->image && Storage::exists($about->image)) {
                Storage::delete($about->image);
            }
            $about->image = $request->file('image')->store('abouts/images', 'public');
        }
        if ($request->hasFile('photo')) {
            if ($about->photo && Storage::exists($about->photo)) {
                Storage::delete($about->photo);
            }
            $about->photo = $request->file('photo')->store('abouts/photos', 'public');
        }
        $about->about_or_company_uz = $request->input('about_or_company_uz');
        $about->about_or_company_ru = $request->input('about_or_company_ru');
        $about->about_or_company_en = $request->input('about_or_company_en');
        $about->description_uz = $request->input('description_uz');
        $about->description_ru = $request->input('description_ru');
        $about->description_en = $request->input('description_en');
        $about->content_uz = $request->input('content_uz');
        $about->content_ru = $request->input('content_ru');
        $about->content_en = $request->input('content_en');
        $about->save();
        return redirect()->back()->with('success', 'Data updated successfully');
    }

}
