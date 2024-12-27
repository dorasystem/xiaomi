<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticKeyword;
use Illuminate\Http\Request;

class StaticKeywordController extends Controller
{
    // Statik kalit so'zlarni ko'rsatish
    public function index()
    {
        $keywords = StaticKeyword::all();
        return view('admin.keywords.index', compact('keywords'));
    }

    // Kalit so'zni yaratish
    public function create()
    {
        return view('admin.keywords.create');
    }

    // Kalit so'zni saqlash
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:static_keywords,key',
            'en' => 'required|string',
            'ru' => 'required|string',
            'uz' => 'required|string',
        ]);

        StaticKeyword::create($request->all());

        return redirect()->route('keywords.index')->with('success', 'Kalit so\'z muvaffaqiyatli yaratildi.');
    }

    // Kalit so'zni tahrirlash
    public function edit($id)
    {
        $keyword = StaticKeyword::findOrFail($id);
        return view('admin.keywords.edit', compact('keyword'));
    }

    // Kalit so'zni yangilash
    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required|string|unique:static_keywords,key,' . $id,
            'en' => 'required|string',
            'ru' => 'required|string',
            'uz' => 'required|string',
        ]);

        $keyword = StaticKeyword::findOrFail($id);
        $keyword->update($request->all());

        return redirect()->route('keywords.index')->with('success', 'Kalit so\'z muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $static = StaticKeyword::findOrFail($id);
        $static->delete();
        return redirect()->route('keywords.index');
    }
}
