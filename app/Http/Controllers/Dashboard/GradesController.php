<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::with('classe')->get();
        $classes = Classe::all();
        return view('grades', compact('grades', 'classes'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'classe_id' => 'required|exists:classe,id',
        ]);

        Grade::create($request->only('name', 'classe_id'));

        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'classe_id' => 'required|exists:classe,id',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update($request->only('name', 'classe_id'));

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function show($id)
    {
        $grade = Grade::with('classe')->findOrFail($id);
        return response()->json($grade);
    }


    public function destroy($id)
    {
        $grade = Grade::find($id);

        if ($grade) {
            $grade->delete();
            return redirect()->back()->with('success', 'Grade deleted successfully.');
        }

        return redirect()->back()->with('error', 'Grade not found.');
    }
}
