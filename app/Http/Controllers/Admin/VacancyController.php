<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies = Vacancy::all();
        return view('admin.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('admin.vacancies.create');
    }
    public function show(Vacancy $vacancy)
    {
        return view('admin.vacancies.show', compact('vacancy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_en' => 'nullable|string',
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'date' => 'nullable|date',
            'status' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vacancies', 'public'); // Store image in 'vacancies' folder
        } else {
            $imagePath = null;
        }

        Vacancy::create([
            'name_uz' => $request->input('name_uz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'title_uz' => $request->input('title_uz'),
            'title_ru' => $request->input('title_ru'),
            'title_en' => $request->input('title_en'),
            'content_uz' => $request->input('content_uz'),
            'content_ru' => $request->input('content_ru'),
            'content_en' => $request->input('content_en'),
            'image' => $imagePath, // Save image path
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('vacancies.index')->with('success', 'Vakansiya muvaffaqiyatli qo\'shildi.');
    }


    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_en' => 'nullable|string',
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'date' => 'nullable|date',
            'status' => 'nullable|string',
        ]);

        // Find the existing vacancy
        $vacancy = Vacancy::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($vacancy->image) {
                Storage::delete('public/' . $vacancy->image);
            }

            $imagePath = $request->file('image')->store('vacancies', 'public');
        } else {
            // Keep the old image path if no new image is uploaded
            $imagePath = $vacancy->image;
        }

        // Update the vacancy with the new data
        $vacancy->update([
            'name_uz' => $request->input('name_uz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'title_uz' => $request->input('title_uz'),
            'title_ru' => $request->input('title_ru'),
            'title_en' => $request->input('title_en'),
            'content_uz' => $request->input('content_uz'),
            'content_ru' => $request->input('content_ru'),
            'content_en' => $request->input('content_en'),
            'image' => $imagePath, // Save the updated image path
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('vacancies.index')->with('success', 'Vakansiya muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->route('vacancies.index')->with('success', 'Vakansiya muvaffaqiyatli o\'chirildi.');
    }
}
