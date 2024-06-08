<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Classe;
use App\Models\Grade;
use App\Models\Homework;
use App\Models\Module;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    // public function generate()
    // {
    //     // Generate and insert dummy data into the database
    //     // Example: Insert dummy users
    //     DB::table('users')->insert([
    //         [
    //             'name' => 'John Doe',
    //             'email' => 'john@example.com',
    //             'password' => Hash::make('password'),
    //         ],
    //         [
    //             'name' => 'Jane Smith',
    //             'email' => 'jane@example.com',
    //             'password' => Hash::make('password'),
    //         ],
    //         // Add more dummy data as needed
    //     ]);

    //     return 'Dummy data generated successfully!';
    // }

    public function activateUser(Request $request)
    {
        $user = User::find($request->id);
        // dd($request->id);
        {
            $user = User::find($request->id);
            // dd($user);
            if ($user) {
                $user->is_active = 1;
                $user->save();
                // dd($user);

                return redirect()->back()->with('success', 'User activated successfully.');
            }

            return redirect()->back()->with('error', 'User not found.');
        }
    }
    public function students_pending_index()
    {
        $filteredsevenStudents = Student::with('user')
        ->where('student_grade', 'seven')
        ->whereHas('user', function($query) {
            $query->where('is_active', 0);
        })
        ->get();
        $filteredeightStudents = Student::with('user')
        ->where('student_grade', 'eight')
        ->whereHas('user', function($query) {
            $query->where('is_active', 0);
        })
        ->get();
        $filterednineStudents = Student::with('user')
        ->where('student_grade', 'nine')
        ->whereHas('user', function($query) {
            $query->where('is_active', 0);
        })
        ->get();

        // dd($filterednineStudents);
        return view('espace_intranet.students-pending-list', compact('filteredsevenStudents','filteredeightStudents','filterednineStudents'));
    }
    public function students_valid_index()
    {
        $filteredsevenStudents = Student::with('user')
        ->where('student_grade', 'seven')
        ->whereHas('user', function($query) {
            $query->where('is_active', 1);
        })
        ->get();
        $filteredeightStudents = Student::with('user')
        ->where('student_grade', 'eight')
        ->whereHas('user', function($query) {
            $query->where('is_active', 1);
        })
        ->get();
        $filterednineStudents = Student::with('user')
        ->where('student_grade', 'nine')
        ->whereHas('user', function($query) {
            $query->where('is_active', 1);
        })
        ->get();

        return view('espace_intranet.students-valid-list',  compact('filteredsevenStudents','filteredeightStudents','filterednineStudents'));
    }
    public function home()
    {
        if (Auth::check()) {
            // Retrieve the authenticated user with the 'students' relationship
            $user = User::with('user')->find(Auth::id());
            $subjects = Subject::with('module')->get();
            $modules = Module::all();
            return view('espace_intranet.home', compact('user'));
        }
    }
    public function dashboard()
    {
        $user = User::with('user')->find(Auth::id());
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
        $subjects = Subject::with(['module', 'teacher'])->get();
        // dd($subjects);
        $teachers = User::where('role', 'teacher')->get();
        $classes = Classe::all();
        $modules = Module::all();
        return view('espace_intranet.subjects', compact('teachers', 'subjects', 'modules', 'classes'));
    }
    public function store_subjects(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'module_id' => 'required',
            'teacher_id' => 'required', // Validate the teacher_id field
            'class_id' => 'required',
        ]);

        // Create a new subject using the validated data
        Subject::create([
            'name' => $request->input('name'),
            'module_id' => $request->input('module_id'),
            'user_id' => $request->input('teacher_id'), // Use teacher_id instead of user_id
            'class_id' => $request->input('class_id'),
        ]);

        // Redirect back with success message
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
        // dd($request);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'grade_id' => 'required',
            'teacher_ids' => 'required|array', // Ensure teacher_ids is an array
            'teacher_ids.*' => 'exists:users,id', // Ensure each teacher ID exists in the users table
        ]);
        // dd($request);
        $class = Classe::create([
            'name' => $request->input('name'),
            'grade_id' => $request->input('grade_id'),
        ]);

        $class->teachers()->attach($request->input('teacher_ids'));
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
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'pdf' => 'nullable|mimes:pdf|max:10000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
            'video' => 'nullable|mimes:mp4,mov,ogg|max:20000',
            'classes_ids' => 'required|array',
            'classes_ids.*' => 'exists:classes,id',
        ]);

        $homework = new Homework($request->all());
        $homework->user_id = auth()->id();
        if ($request->hasFile('pdf')) {
            $homework->pdf = $request->file('pdf')->store('homework_files', 'public');
        }
        if ($request->hasFile('image')) {
            $homework->image = $request->file('image')->store('homework_files', 'public');
        }
        if ($request->hasFile('video')) {
            $homework->video = $request->file('video')->store('homework_files', 'public');
        }

        $homework->save();

        $homework->classes()->attach($request->input('classes_ids'));
        return redirect()->route('homework.index')->with('success', 'Homework created successfully.');
    }
    public function update_homework(Request $request, Homework $homework)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'pdf' => 'nullable|mimes:pdf|max:10000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
            'video' => 'nullable|mimes:mp4,mov,ogg|max:20000',
            'classes' => 'required|array'
        ]);

        $homework->fill($request->all());

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($homework->pdf);
            $homework->pdf = $request->file('pdf')->store('homework_files', 'public');
        }
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($homework->image);
            $homework->image = $request->file('image')->store('homework_files', 'public');
        }
        if ($request->hasFile('video')) {
            Storage::disk('public')->delete($homework->video);
            $homework->video = $request->file('video')->store('homework_files', 'public');
        }

        $homework->save();
        $homework->classes()->sync($request->input('classes'));

        return redirect()->route('homework.index')->with('success', 'Homework updated successfully.');
    }
    public function show_homework($id)
    {
        $homework = Homework::with('classes')->findOrFail($id);
        return view('espace_intranet.homeworkdetails', compact('homework'));
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

    // teachers notes functions
    public function notes_index()
    {
        return view('espace_intranet.teachersnotes');
    }

    //marks functions
    public function marks_index()
    {
        return view('espace_intranet.marks');
    }

    //info functions
    public function info_index()
    {
        $informations = Information::all();
        return view('espace_intranet.informations', compact('informations'));
    }

    public function info_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string'
        ]);

        $information = new Information();
        $information->title = $request->title;
        $information->content = $request->content;
        $information->author = $request->author;
        $information->save();

        return redirect()->back()->with('success', 'Information added successfully!');
    }
}
