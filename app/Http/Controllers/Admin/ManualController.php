<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManualController extends Controller
{
    /**
     * Display a listing of the manuals.
     */
    public function index()
    {
        $manuals = Manual::all();
        return view('admin.manuals.index', compact('manuals'));
    }

    /**
     * Show the form for creating a new manual.
     */
    public function create()
    {
        return view('admin.manuals.create');
    }

    /**
     * Store a newly created manual in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_en' => 'nullable|string',
            'pdf_uz' => 'nullable|file|mimes:pdf',
            'pdf_ru' => 'nullable|file|mimes:pdf',
            'pdf_en' => 'nullable|file|mimes:pdf',
        ]);

        $data = $request->only(['name_uz', 'name_ru', 'name_en']);

        foreach (['pdf_uz', 'pdf_ru', 'pdf_en'] as $lang) {
            if ($request->hasFile($lang)) {
                $data[$lang] = $request->file($lang)->store('manuals', 'public');
            }
        }

        Manual::create($data);

        return redirect()->route('admin.manuals.index')->with('success', 'Manual created successfully');
    }

    /**
     * Display the specified manual.
     */
    public function show(Manual $manual)
    {
        return view('admin.manuals.show', compact('manual'));
    }

    /**
     * Show the form for editing the specified manual.
     */
    public function edit(Manual $manual)
    {
        return view('admin.manuals.edit', compact('manual'));
    }

    /**
     * Update the specified manual in storage.
     */
    public function update(Request $request, Manual $manual)
    {
        $request->validate([
            'name_uz' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_en' => 'nullable|string',
            'pdf_uz' => 'nullable|file|mimes:pdf',
            'pdf_ru' => 'nullable|file|mimes:pdf',
            'pdf_en' => 'nullable|file|mimes:pdf',
        ]);

        $data = $request->only(['name_uz', 'name_ru', 'name_en']);

        foreach (['pdf_uz', 'pdf_ru', 'pdf_en'] as $lang) {
            if ($request->hasFile($lang)) {
                if ($manual->$lang) {
                    Storage::disk('public')->delete($manual->$lang);
                }
                $data[$lang] = $request->file($lang)->store('manuals', 'public');
            }
        }

        $manual->update($data);

        return redirect()->route('admin.manuals.index')->with('success', 'Manual updated successfully');
    }

    /**
     * Remove the specified manual from storage.
     */
    public function destroy(Manual $manual)
    {
        foreach (['pdf_uz', 'pdf_ru', 'pdf_en'] as $lang) {
            if ($manual->$lang) {
                Storage::disk('public')->delete($manual->$lang);
            }
        }

        $manual->delete();

        return redirect()->route('admin.manuals.index')->with('success', 'Manual deleted successfully');
    }
}
