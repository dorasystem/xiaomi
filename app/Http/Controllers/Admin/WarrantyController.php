<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller {
    public function edit() {
        $warranty = Warranty::firstOrCreate(
            ['slug' => 'warranty'],
            ['title_uz' => '', 'title_en' => '', 'title_ru' => '', 'content_uz' => '', 'content_en' => '', 'content_ru' => '']
        );
        return view('admin.warranty.edit', compact('warranty'));
    }

    public function update(Request $request) {
        $warranty = Warranty::where('slug', 'warranty')->firstOrFail();
        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'content_uz' => 'required',
            'content_en' => 'required',
            'content_ru' => 'required',
        ]);

        $warranty->update($request->all());
        return redirect()->route('warranty.edit')->with('success', 'Kafolat sahifasi yangilandi!');
    }
}
