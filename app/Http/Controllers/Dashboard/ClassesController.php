<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classe::with('Grade', 'teacher')->get();
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('espace_intranet.classes', compact('classes', 'grades', 'teachers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grade,id',
            'teacher_id' => 'required|exists:teacher,id',
        ]);

        Classe::create($request->only('name', 'grade_id', 'teacher_id'));

        return redirect()->back()->with('success', 'Class added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grade,id',
            'teacher_id' => 'required|exists:teacher,id',
        ]);

        $classe = Classe::findOrFail($id);
        $classe->update($request->only('name', 'grade_id', 'teacher_id'));

        return redirect()->back()->with('success', 'Class updated successfully.');
    }

    public function show($id)
    {
        $classe = Classe::with('Grade', 'teacher')->findOrFail($id);
        return response()->json($classe);
    }
    public function destroy($id)
    {
        $classe = Classe::find($id);

        if ($classe) {
            $classe->delete();
            return redirect()->back()->with('success', 'Class deleted successfully.');
        }

        return redirect()->back()->with('error', 'Class not found.');
    }
}
