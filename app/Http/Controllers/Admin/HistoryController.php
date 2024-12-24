<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, [1, 2])) {
            abort(403, 'Ushbu sahifaga kirish ruxsati yo‘q.');
        }
    }

    public function index()
    {
        $histories = History::all();
        return view('admin.histories.index', compact('histories'));
    }

    public function create()
    {
        return view('admin.histories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'year' => 'nullable|integer',
        ]);

        History::create($validated);

        return redirect()->route('histories.index')->with('success', 'History muvaffaqiyatli yaratildi.');
    }

    public function edit(History $history)
    {
        return view('admin.histories.edit', compact('history'));
    }

    public function update(Request $request, History $history)
    {
        $validated = $request->validate([
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'year' => 'nullable|integer',
        ]);

        $history->update($validated);

        return redirect()->route('histories.index')->with('success', 'History muvaffaqiyatli yangilandi.');
    }

    public function destroy(History $history)
    {
        $history->delete();

        return redirect()->route('histories.index')->with('success', 'History muvaffaqiyatli o\'chirildi.');
    }
}
