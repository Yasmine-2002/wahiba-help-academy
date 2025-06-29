<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;

class SubjectController extends Controller
{
    public function index()
    {
        $levels = Level::with('subjects')->get();
        return view('admin.subjects.index', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'level_id' => 'required|exists:levels,id',
        ]);

        Subject::create([
            'name' => $request->name,
            'level_id' => $request->level_id,
        ]);

        return redirect()->back()->with('success', 'Matière ajoutée.');
    }
    public function destroy(Subject $subject)
{
    $subject->delete();
    return redirect()->back()->with('success', 'Matière supprimée avec succès.');
}

}

