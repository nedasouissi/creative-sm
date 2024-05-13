<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function index(){
        $modules = Module::all();
        return view('modules', compact('modules'));
    }
}
