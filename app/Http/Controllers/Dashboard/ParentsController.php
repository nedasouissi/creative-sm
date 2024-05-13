<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $StudentParents = StudentParent::with('students')->get();
        return view('parent', compact('StudentParents'));
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
            'father_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'father_last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/','max:255'],
            'father_phone' => ['required', 'integer'],
            'father_job' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'mother_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'mother_last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/','max:255'],
            'mother_phone' => ['required', 'integer'],
            'mother_job' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'parent_email' => ['required', 'email', Rule::unique('student_parent', 'parent_email')],
          //  'password' => ['required', 'string', 'min:8', 'confirmed'],
            'student_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'student_last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'student_phone' => ['required', 'integer'],
            'student_grade' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'before_or_equal:2013-12-31'],
          //  'avatar' => ['required', 'image', 'max:1024'],
        ]);

        $parent= new StudentParent();
        $student = new Student;
        $parent->father_name = $request->input('father_name');
        $parent->father_last_name = $request->input('father_last_name');
        $parent->father_phone = $request->input('father_phone');
        $parent->father_job = $request->input('father_job');
        $parent->mother_name = $request->input('mother_name');
        $parent->mother_last_name = $request->input('mother_last_name');
        $parent->mother_phone = $request->input('mother_phone');
        $parent->mother_job = $request->input('mother_job');
       $parent->parent_email = $request->input('parent_email');
        $parent->status = 0;
        $parent->save();

        $student->student_name = $request->input('student_name');
        $student->student_last_name = $request->input('student_last_name');
        $student->student_phone = $request->input('student_phone');
        $student->student_grade = $request->input('student_grade');
        $student->birthdate = $request->input('birthdate');
        $student->student_parent_id = $parent->id;
       // if ($request->hasFile('avatar')) {
        //   $avatarPath = $request->file('avatar')->store('avatars');
         //   $student->avatar = $avatarPath;
        // }
        $student->save();
        return redirect('/parent')->with('success', 'Data saved');


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
