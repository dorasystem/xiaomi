<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, [1, 2])) {
            abort(403, 'Ushbu sahifaga kirish ruxsati yo‘q.');
        }
    }

    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_uz' => 'nullable|string',
            'question_ru' => 'nullable|string',
            'question_en' => 'nullable|string',
            'answer_uz' => 'nullable|string',
            'answer_ru' => 'nullable|string',
            'answer_en' => 'nullable|string',
        ]);

        Faq::create($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ muvaffaqiyatli yaratildi.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question_uz' => 'nullable|string',
            'question_ru' => 'nullable|string',
            'question_en' => 'nullable|string',
            'answer_uz' => 'nullable|string',
            'answer_ru' => 'nullable|string',
            'answer_en' => 'nullable|string',
        ]);

        $faq->update($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ muvaffaqiyatli yangilandi.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ muvaffaqiyatli o\'chirildi.');
    }
}
