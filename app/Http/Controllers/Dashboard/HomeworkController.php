<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index(){
        $classes = Classe::all();
        $homework = Homework::all();
        return view('homework', compact('homework',  'classes'));

    }
    public function store(Request $request)

    {
        $this->validate($request,[

            'title' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'content' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'deadline' => ['required', 'date'],
            'classe_id' => ['required'],
        ]);

        $homework = new Homework();
        $homework->title =$request->input('title');
        $homework->content = $request->input('content');
        $homework->deadline = $request ->input('deadline');

        $homework->classe_id = $request->input('classe_id');
        $homework->save();
        return redirect('/homework')->with('success', 'Data saved');    }


}
