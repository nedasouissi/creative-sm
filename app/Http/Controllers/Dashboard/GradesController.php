<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $classes = Classe::all();
        return view('grades', compact('grades', 'classes'));    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','string','max:255'],
            'classe_id' => ['required'],
        ]);

        $grade = new Grade;
        $grade->name = $request->input('name');
        $grade->classe_id = $request->input('classe_id');
       $grade->save();

        return redirect('/grades')->with('success', 'Data saved');
    }
}
