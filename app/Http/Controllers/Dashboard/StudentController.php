<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('studentParent')->get();
        $parents = StudentParent::all();
        return view('students', compact('students','parents'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'father_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'father_last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'father_phone' => 'required|numeric',
            'father_job' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'mother_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'mother_last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'mother_phone' => 'required|numeric',
            'mother_job' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'parent_email' => ['required', 'email', Rule::unique('student_parent', 'parent_email')],
            'student_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'student_last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'student_phone' => 'required|numeric',
            'student_grade' => 'required|string|max:255',
            'birthdate' => 'required|date|before_or_equal:2013-12-31',
              'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $parent = StudentParent::create($request->only([
            'father_name', 'father_last_name', 'father_phone', 'father_job',
            'mother_name', 'mother_last_name', 'mother_phone', 'mother_job',
            'parent_email'
        ]));

        $studentData = $request->only([
            'student_name', 'student_last_name', 'student_phone', 'student_grade', 'birthdate'
        ]);
        $studentData['student_parent_id'] = $parent->id;
        if ($request->hasFile('avatar')) {
            $studentData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        Student::create($studentData);

        return redirect()->back()->with('success', 'Student added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'father_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'father_last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'father_phone' => 'required|numeric',
            'father_job' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'mother_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'mother_last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'mother_phone' => 'required|numeric',
            'mother_job' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'parent_email' => 'required|email',
            'student_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'student_last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'student_phone' => 'required|numeric',
            'student_grade' => 'required|string|max:255',
            'birthdate' => 'required|date|before_or_equal:2013-12-31',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = Student::findOrFail($id);
        $parent = $student->studentParent;

        $parent->update($request->only([
            'father_name', 'father_last_name', 'father_phone', 'father_job',
            'mother_name', 'mother_last_name', 'mother_phone', 'mother_job',
            'parent_email'
        ]));

        $studentData = $request->only([
            'student_name', 'student_last_name', 'student_phone', 'student_grade', 'birthdate'
        ]);
        if ($request->hasFile('avatar')) {
            $studentData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        $student->update($studentData);

        return redirect()->back()->with('success', 'Student updated successfully.');
    }
    public function show($id)
    {
        $student = Student::with('studentParent')->find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found.'], 404);
        }

        return response()->json($student);
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
