<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['module'])->get();
        $modules = Module::all();
        return view('espace_intranet.subjects', compact('subjects', 'modules'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'module_id' => 'required|exists:module,id',
            'teacher_id' => 'required|exists:teacher,id',
        ]);

        Subject::create($request->only('name', 'module_id', 'teacher_id'));

        return redirect()->back()->with('success', 'Subject added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'module_id' => 'required|exists:module,id',
            'teacher_id' => 'required|exists:teacher,id',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->only('name', 'module_id', 'teacher_id'));

        return redirect()->back()->with('success', 'Subject updated successfully.');
    }

    public function show($id)
    {
        $subject = Subject::with(['module'])->findOrFail($id);
        return response()->json($subject);
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);

        if ($subject) {
            $subject->delete();
            return redirect()->back()->with('success', 'Subject deleted successfully.');
        }

        return redirect()->back()->with('error', 'Subject not found.');
    }
}
