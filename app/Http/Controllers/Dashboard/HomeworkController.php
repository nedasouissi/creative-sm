<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        $homework = Homework::with('classes')->get();
        $classes = Classe::all();
        return view('homework', compact('homework', 'classes'));
    }

    public function store(Request $request)
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

    public function update(Request $request, $id)
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

    public function show($id)
    {
        $homework = Homework::with('classes')->findOrFail($id);
        return response()->json($homework);
    }

    public function destroy($id)
    {
        $homework = Homework::find($id);

        if ($homework) {
            $homework->delete();
            return redirect()->back()->with('success', 'Homework deleted successfully.');
        }

        return redirect()->back()->with('error', 'Homework not found.');
    }
}
