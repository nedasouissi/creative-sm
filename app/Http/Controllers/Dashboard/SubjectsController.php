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
        $subjects = Subject::all();
        $modules = Module::all();
        $teachers = Teacher::all();
        return view('subjects', compact('subjects', 'modules', 'teachers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create( Request $request)
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

            'name' => ['required','string','max:255'],
            'module_id' => ['required'],
            'teacher_id' => ['required'],
        ]);
        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->module_id = $request->input('module_id');
        $subject->teacher_id = $request->input('teacher_id');

        $subject->save();

        return redirect('/subjects')->with('success', 'Data saved');
    }

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
