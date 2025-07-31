<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with(['major', 'teacher'])->paginate(10);
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        $majors = Major::all();
        $teachers = Teacher::all();
        return view('classrooms.create', compact('majors', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major_id' => 'required|exists:majors,id',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        Classroom::create($request->all());

        return redirect()->route('classrooms.index')->with('success', 'Classroom created successfully.');
    }

    public function edit(Classroom $classroom)
    {
        $majors = Major::all();
        $teachers = Teacher::all();
        return view('classrooms.edit', compact('classroom', 'majors', 'teachers'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required',
            'major_id' => 'required|exists:majors,id',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        $classroom->update($request->all());

        return redirect()->route('classrooms.index')->with('success', 'Classroom updated successfully.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Classroom deleted successfully.');
    }
}
