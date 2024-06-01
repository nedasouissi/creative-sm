<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ParentsController extends Controller
{

    public function index()
    {
        $StudentParents = StudentParent::with('students')->get();
        return view('espace_intranet.parent', compact('StudentParents'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'father_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'father_last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'father_phone' => ['required', 'integer'],
            'father_job' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'mother_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'mother_last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
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

        $parent = new StudentParent();
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

    public function toggleStatus(Request $request, $id)
    {
        $parent = StudentParent::findOrFail($id);
        $parent->status = $request->status;
        $parent->save();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'father_name' => 'required|string|max:255',
            'father_last_name' => 'required|string|max:255',
            'father_phone' => 'required|numeric',
            'father_job' => 'required|string|max:255',
            'parent_email' => 'required|email',

            'mother_name' => 'required|string|max:255',
            'mother_last_name' => 'required|string|max:255',
            'mother_phone' => 'required|numeric',
            'mother_job' => 'required|string|max:255',

            'student_name' => 'required|string|max:255',
            'student_last_name' => 'required|string|max:255',
            'student_phone' => 'required|numeric',
            'student_grade' => 'required|string|max:255',
            'birthdate' => 'required|date',
            // 'avatar' => 'nullable|image'
        ]);

        $parent = StudentParent::findOrFail($id);
        $parent->father_name = $request->father_name;
        $parent->father_last_name = $request->father_last_name;
        $parent->father_phone = $request->father_phone;
        $parent->father_job = $request->father_job;
        $parent->parent_email = $request->parent_email;

        $parent->mother_name = $request->mother_name;
        $parent->mother_last_name = $request->mother_last_name;
        $parent->mother_phone = $request->mother_phone;
        $parent->mother_job = $request->mother_job;

        $parent->student_name = $request->student_name;
        $parent->student_last_name = $request->student_last_name;
        $parent->student_phone = $request->student_phone;
        $parent->student_grade = $request->student_grade;
        $parent->birthdate = $request->birthdate;

        if ($request->hasFile('avatar')) {
            $parent->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $parent->save();

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $parent = StudentParent::findOrFail($id);
        return response()->json($parent);
    }
    public function destroy($id)
    {
        $parent = StudentParent::find($id);

        if ($parent) {
            $parent->delete();
            return redirect()->back()->with('success', 'Parent deleted successfully.');
        }

        return redirect()->back()->with('error', 'Parent not found.');
    }
}
