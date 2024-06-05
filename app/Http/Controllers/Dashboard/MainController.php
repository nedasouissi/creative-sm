<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Grade;
use App\Models\Homework;
use App\Models\Module;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function home()
    {
        if (Auth::check()) {
            // Retrieve the authenticated user with the 'students' relationship
            $user = User::with('students')->find(Auth::id());
            $subjects = Subject::with(['module'])->get();
            $modules = Module::all();
            // dd($user);
            // Return the view with the user data
            return view('espace_intranet.home', compact('user'));
        }
    }
    public function dashboard()
    {
        $user = User::with('students')->find(Auth::id());
        // $teacherCount = Teacher::count ();
        $teacherCount = 0;
        $studentCount = 0;
        $parentCount = 0;
        $modulesCount = 0;
        $classesCount = 0;
        $subjectsCount = 0;
        //compact : create an array of values
        return view('espace_intranet.dashboard', compact('user', 'teacherCount', 'studentCount', 'parentCount', 'modulesCount', 'subjectsCount', 'classesCount'));
    }
    //subjects functions
    public function subjects_index()
    {
        $subjects = Subject::with(['module'])->get();
        $teachers = User::where('role', 'teacher')->get();
        $classes = Classe::all();
        $modules = Module::all();
        return view('espace_intranet.subjects', compact('teachers', 'subjects', 'modules', 'classes'));
    }
    public function store_subjects(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'module_id' => 'required',
            'user_id' => 'required',
            'class_id' => 'required',

        ]);
        dd();
        Subject::create($request->only('name', 'module_id', 'user_id'));

        return redirect()->back()->with('success', 'Subject added successfully.');
    }
    public function update_subjects(Request $request, $id)
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
    public function show_subjects($id)
    {
        $subject = Subject::with(['module'])->findOrFail($id);
        return response()->json($subject);
    }
    public function destroy_subjects($id)
    {
        $subject = Subject::find($id);

        if ($subject) {
            $subject->delete();
            return redirect()->back()->with('success', 'Subject deleted successfully.');
        }

        return redirect()->back()->with('error', 'Subject not found.');
    }
    //Module functions
    public function modules_index()
    {
        $modules = Module::all();
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('espace_intranet.modules', compact('modules', 'grades', 'subjects'));
    }
    public function store_modules(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'coefficient' => 'required|numeric',

        ]);

        Module::create($request->only('name', 'coefficient'));

        return redirect()->back()->with('success', 'Module added successfully.');
    }
    public function update_modules(Request $request, $id)
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
    public function show_modules($id)
    {
        $module = Module::with(['grade', 'subjects'])->findOrFail($id);
        return response()->json($module);
    }
    public function destroy_modules($id)
    {
        $module = Module::find($id);

        if ($module) {
            $module->delete();
            return redirect()->back()->with('success', 'Module deleted successfully.');
        }

        return redirect()->back()->with('error', 'Module not found.');
    }
    //grades functions
    public function grades_index()
    {
        $grades = Grade::with('classe')->get();
        $classes = Classe::all();
        return view('espace_intranet.grades', compact('grades', 'classes'));
    }
    public function store_grades(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',

        ]);

        Grade::create($request->only('name'));

        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }
    public function update_grades(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'classe_id' => 'required|exists:classe,id',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update($request->only('name', 'classe_id'));

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }
    public function show_grades($id)
    {
        $grade = Grade::with('classe')->findOrFail($id);
        return response()->json($grade);
    }
    public function destroy_grades($id)
    {
        $grade = Grade::find($id);

        if ($grade) {
            $grade->delete();
            return redirect()->back()->with('success', 'Grade deleted successfully.');
        }

        return redirect()->back()->with('error', 'Grade not found.');
    }

    // classes functions
    public function classes_index()
    {
        $classes = Classe::all();
        $grades = Grade::all();
        $teachers = User::where('role', 'teacher')->get();
        // dd($teachers, $grades, $classes);
        return view('espace_intranet.classes', compact('classes', 'grades', 'teachers'));
    }

    public function store_classes(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'grade_id' => 'required',
            'user_id' => 'required',
        ]);
        // dd($request);
        Classe::create($request->only('name', 'grade_id', 'user_id'));

        return redirect()->back()->with('success', 'Class added successfully.');
    }
    public function update_classes(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grade,id',
            'user_id' => 'required|exists:teacher,id',
        ]);

        $classe = Classe::findOrFail($id);
        $classe->update($request->only('name', 'grade_id', 'user_id'));

        return redirect()->back()->with('success', 'Class updated successfully.');
    }
    public function show_classes($id)
    {
        $classe = Classe::with('Grade', 'user')->findOrFail($id);
        return response()->json($classe);
    }
    public function destroy_classes($id)
    {
        $classe = Classe::find($id);

        if ($classe) {
            $classe->delete();
            return redirect()->back()->with('success', 'Class deleted successfully.');
        }

        return redirect()->back()->with('error', 'Class not found.');
    }

    //homework functions
    public function homework_index()
    {
        $homework = Homework::with('classes')->get();
        $classes = Classe::all();
        return view('espace_intranet.homework', compact('homework', 'classes'));
    }

    public function store_homework(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'deadline' => 'required|date',
            'classes' => 'required|array',
        ]);

        $homework = Homework::create($request->only('title', 'description', 'deadline'));
        $homework->classes()->attach($request->input('classes'));

        return redirect()->back()->with('success', 'Homework added successfully.');
    }
    public function update_homework(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'deadline' => 'required|date',
            'classes' => 'required|array',
        ]);

        $homework = Homework::findOrFail($id);
        $homework->update($request->only('title', 'description', 'deadline'));
        $homework->classes()->sync($request->input('classes'));

        return redirect()->back()->with('success', 'Homework updated successfully.');
    }
    public function show_homework($id)
    {
        $homework = Homework::with('classes')->findOrFail($id);
        return response()->json($homework);
    }
    public function destroy_homework($id)
    {
        $homework = Homework::find($id);

        if ($homework) {
            $homework->delete();
            return redirect()->back()->with('success', 'Homework deleted successfully.');
        }

        return redirect()->back()->with('error', 'Homework not found.');
    }

    // teachers notes routes
    public function notes_index()
    {
        return view('espace_intranet.teachersnotes');
    }

    //marks routes
    public function marks_index()
    {
        return view('espace_intranet.marks');
    }

    //info
    public function info_index()
    {
        return view('espace_intranet.informations');
    }
}
