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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(){
        $subjects = Subject::all();
        $classes = Classe::all();
        $teachers = Teacher::all();

        return view('teachers', compact('teachers', 'subjects', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)

    {
        $this->validate($request,[

            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'teacher_birthdate' => ['required', 'date', 'before_or_equal:2001-12-31'],
            'teacher_phone' => ['required', 'integer'],
            'subject_id' => ['required'],
            'classe_id' => ['required'],
        ]);

        $teacher = new Teacher();
        $teacher->name =$request->input('name');
        $teacher->last_name = $request->input('last_name');
        $teacher->teacher_birthdate = $request ->input('teacher_birthdate');
        $teacher->teacher_phone = $request ->input('teacher_phone');
        $teacher->subject_id = $request->input('subject_id');
        $teacher->classe_id = $request->input('classe_id');
       $teacher->save();
        return redirect('/teacher')->with('success', 'Data saved');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
