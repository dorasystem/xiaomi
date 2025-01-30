<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidant;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CandidantController extends Controller
{
    public function index()
    {

        $candidants = Candidant::with('vacancy')->orderBy('created_at', 'desc')->get();
        return view('admin.candidants.index', compact('candidants'));
    }

    public function create()
    {

        $vacancies = Vacancy::all();
        return view('admin.candidants.create', compact('vacancies'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:candidants,email',
            'phone' => 'nullable|string|max:20',
            'comment' => 'nullable|string|max:20',
            'vacancy_id' => 'required|exists:vacancies,id',
            'status' => 'required|in:pending,approved,rejected',
            'resume_file' => 'nullable|file|mimes:pdf,docx,doc|max:2048',
        ]);


        Candidant::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
            'vacancy_id' => $request->input('vacancy_id'),
            'status' => $request->input('status'),
            'resume_file' => $request->file('resume_file') ? $request->file('resume_file')->store('resumes') : null,
        ]);


        return redirect()->route('candidants.index')->with('success', 'Кандидат успешно добавлен.');
    }

    public function edit($id)
    {

        $candidant = Candidant::findOrFail($id);
        $vacancies = Vacancy::all();
        return view('admin.candidants.edit', compact('candidant', 'vacancies'));
    }
    public function show(Candidant $candidant)
    {
        return view('admin.candidants.show', compact('candidant'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:candidants,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'comment' => 'nullable|string|max:20',
            'vacancy_id' => 'nullable|exists:vacancies,id',
            'status' => 'nullable|in:pending,approved,rejected',
            'resume_file' => 'nullable|file|mimes:pdf,docx,doc|max:2048',
        ]);


        $candidant = Candidant::findOrFail($id);
        $candidant->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
            'vacancy_id' => $request->input('vacancy_id'),
            'status' => $request->input('status'),
            'resume_file' => $request->file('resume_file') ? $request->file('resume_file')->store('resumes') : $candidant->resume_file,
        ]);


        return redirect()->route('candidants.index')->with('success', 'Кандидат успешно обновлен.');
    }

    public function destroy($id)
    {

        $candidant = Candidant::findOrFail($id);
        $candidant->delete();

        // Redirect back with success message
        return redirect()->route('candidants.index')->with('success', 'Кандидат успешно удален.');
    }
}
