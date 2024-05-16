<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Classe;
use App\Models\Module;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(){
        $teacherCount = Teacher::count ();
        $studentCount = Student::count();
        $parentCount = StudentParent::count();
        $modulesCount = Module::count();
        $classesCount = Classe::count();
        $subjectsCount = Subject::count();
        //compact : create an array of values
        return view('dashboard' , compact('teacherCount','studentCount','parentCount','modulesCount','subjectsCount','classesCount'));

    }
}
