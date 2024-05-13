<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index(){
        $grades = Grade::with('classe')->get();
        return view('grades', compact('grades'));
    }
}
