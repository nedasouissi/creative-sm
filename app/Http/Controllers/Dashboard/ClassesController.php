<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index(){
        $classes = Classe::with('grade')->get();
        return view('classes', compact('classes'));
    }
}
