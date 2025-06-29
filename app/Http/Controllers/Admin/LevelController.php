<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:levels,name',
        ]);

        Level::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Année ajoutée.');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->back()->with('success', 'Année supprimée.');
    }
}
