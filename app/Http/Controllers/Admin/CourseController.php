<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Affiche le formulaire de création
    public function create()
    {
        $chapters = Chapter::all();
        $subjects = Subject::all();
        $levels = Level::all();
        $courses = Course::with(['subject', 'level'])->get();
        return view('admin.courses.create', compact('chapters', 'subjects', 'levels', 'courses'));
    }

    // Enregistre le cours soumis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'chapter_id' => 'required|exists:chapters,id',
            'subject_id' => 'required|exists:subjects,id',
            'level_id' => 'required|exists:levels,id',
        ]);

        Course::create($validated);

        return redirect()->back()->with('success', 'Cours ajouté avec succès.');
    }
}
