<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function home()
    {
           // $teacherCount = Teacher::count ();

           //compact : create an array of values
           return view('espace_intranet.home');
    }

    public function dashboard()
    {

        // $teacherCount = Teacher::count ();
        $teacherCount = 0;
        $studentCount = 0;
        $parentCount = 0;
        $modulesCount = 0;
        $classesCount = 0;
        $subjectsCount = 0;
        //compact : create an array of values
        return view('espace_intranet.dashboard', compact('teacherCount', 'studentCount', 'parentCount', 'modulesCount', 'subjectsCount', 'classesCount'));

    }
}
