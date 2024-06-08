<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeworkController extends Controller
{
    public function index()
    {
        $homework = Homework::with('classes')->get();
        $classes = Classe::all();
        return view('espace_intranet.homework', compact('homework', 'classes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'pdf' => 'nullable|mimes:pdf|max:10000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
            'video' => 'nullable|mimes:mp4,mov,ogg|max:20000',
            'classes' => 'required|array'
        ]);

        $homework = new Homework($request->all());

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
        $homework->classes()->sync($request->input('classes'));

        return redirect()->route('homework.index')->with('success', 'Homework created successfully.');
    }

    public function update(Request $request, Homework $homework)
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
