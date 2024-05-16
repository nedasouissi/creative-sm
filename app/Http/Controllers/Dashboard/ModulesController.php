<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Module;
use App\Models\Subject;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function index(){
        {
            $modules = Module::with('subjects', 'grades')->get();
            $subjects = Subject::all();
            $grades = Grade::all();
            return view('modules', compact('modules', 'subjects', 'grades'));
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'coefficient' => ['required', 'numeric'],
            'grade_id' => ['required'],
            'subject_id' => ['required'],
        ]);

        $module = new Module();
        $module->name = $request->input('name');
        $module->coefficient = $request->input('coefficient');
        $module->grade_id = $request->input('grade_id');
        $module->subject_id = $request->input('subject_id');

        $module->save();

        return redirect('/modules')->with('success', 'Data saved');
    }




}
