<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\Attendance;
use App\PDF\AttendancePDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('student.classroom.major')
            ->latest()
            ->paginate(10);

        return view('attendance.index', compact('attendances'));
    }

    public function recap(Request $request)
    {
        $date = $request->input('date', today()->format('Y-m-d'));
        $classroomId = $request->input('classroom_id');

        $query = Attendance::with('student.classroom')
            ->whereDate('scan_time', $date);

        if ($classroomId) {
            $query->whereHas('student', function ($q) use ($classroomId) {
                $q->where('classroom_id', $classroomId);
            });
        }

        $attendances = $query->get();
        $classrooms = Classroom::all();

        return view('attendance.recap', compact('attendances', 'date', 'classrooms', 'classroomId'));
    }

    public function print(Request $request)
    {
        $date = $request->input('date', today()->format('Y-m-d'));
        $classroomId = $request->input('classroom_id');

        $query = Attendance::with('student.classroom.major')
            ->whereDate('scan_time', $date);

        if ($classroomId) {
            $query->whereHas('student', function ($q) use ($classroomId) {
                $q->where('classroom_id', $classroomId);
            });
        }

        $attendances = $query->get();
        $classroom = $classroomId ? Classroom::find($classroomId) : null;

        $pdf = new AttendancePDF($attendances, $date, $classroom);
        return $pdf->download('attendance-report-' . $date . '.pdf');
    }
}
