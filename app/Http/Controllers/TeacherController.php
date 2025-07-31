<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('major')->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $majors = Major::all();
        return view('teachers.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:teachers',
            'name' => 'required',
            'major_id' => 'required|exists:majors,id',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        $majors = Major::all();
        return view('teachers.edit', compact('teacher', 'majors'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'nip' => 'required|unique:teachers,nip,' . $teacher->id,
            'name' => 'required',
            'major_id' => 'required|exists:majors,id',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
