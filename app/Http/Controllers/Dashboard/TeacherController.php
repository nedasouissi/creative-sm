<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject', 'classes')->get();
        $subjects = Subject::all();
        $classes = Classe::all();
        return view('teachers', compact('teachers', 'subjects', 'classes'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->status = $request->status;
        $teacher->save();

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'teacher_phone' => 'required|numeric',
            'teacher_birthdate' => 'required|date|before_or_equal:2000-12-31',
            'subject_id' => 'required|exists:subject,id',
            'classe_id' => 'required|exists:classe,id',
        ]);

        Teacher::create($request->only('name', 'last_name', 'teacher_phone', 'teacher_birthdate', 'subject_id', 'classe_id'));

        return redirect()->back()->with('success', 'Teacher added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'teacher_phone' => 'required|numeric',
            'teacher_birthdate' => 'required|date|before_or_equal:2001-12-31',
            'subject_id' => 'required|exists:subject,id',
            'classe_id' => 'required|exists:classe,id',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->only('name', 'last_name', 'teacher_phone', 'teacher_birthdate', 'subject_id', 'classe_id'));

        return redirect()->back()->with('success', 'Teacher updated successfully.');
    }

    public function show($id)
    {
        $teacher = Teacher::with('subject', 'classes')->findOrFail($id);
        return response()->json($teacher);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if ($teacher) {
            $teacher->delete();
            return redirect()->back()->with('success', 'Teacher deleted successfully.');
        }

        return redirect()->back()->with('error', 'Teacher not found.');
    }
}
