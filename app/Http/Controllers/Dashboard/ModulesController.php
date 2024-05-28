<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Module;
use App\Models\Subject;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function index()
    {
        $modules = Module::with(['grade', 'subjects'])->get();
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('modules', compact('modules', 'grades', 'subjects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'coefficient' => 'required|numeric',
            'grade_id' => 'required|exists:grade,id',
            'subject_id' => 'required|exists:subject,id',
        ]);

        Module::create($request->only('name', 'coefficient', 'grade_id', 'subject_id'));

        return redirect()->back()->with('success', 'Module added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'coefficient' => 'required|numeric',
            'grade_id' => 'required|exists:grade,id',
            'subject_id' => 'required|exists:subject,id',
        ]);

        $module = Module::findOrFail($id);
        $module->update($request->only('name', 'coefficient', 'grade_id', 'subject_id'));

        return redirect()->back()->with('success', 'Module updated successfully.');
    }

    public function show($id)
    {
        $module = Module::with(['grade', 'subjects'])->findOrFail($id);
        return response()->json($module);
    }

    public function destroy($id)
    {
        $module = Module::find($id);

        if ($module) {
            $module->delete();
            return redirect()->back()->with('success', 'Module deleted successfully.');
        }

        return redirect()->back()->with('error', 'Module not found.');
    }
}
