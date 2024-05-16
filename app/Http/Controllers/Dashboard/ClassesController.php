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
        $classes = Classe::all();
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('classes', compact('classes', 'grades', 'teachers'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/', 'max:255'],
            'grade_id' => ['required'],
            'teacher_id' => ['required'],
        ]);
        $classe = new Classe();
        $classe->name =$request->input('name');
        $classe->grade_id = $request->input('grade_id');
        $classe->teacher_id = $request->input('teacher_id');

        $classe->save();

        return redirect('/classes')->with('success', 'Data saved');    }

}
