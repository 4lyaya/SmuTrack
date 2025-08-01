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
    public function index(Request $request)
    {
        $query = Attendance::with('student.classroom.major')
            ->latest();

        // Date filter
        if ($request->has('date')) {
            $query->whereDate('scan_time', $request->date);
        } else {
            $query->whereDate('scan_time', today());
        }

        // Classroom filter
        if ($request->filled('classroom_id')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('classroom_id', $request->classroom_id);
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $attendances = $query->paginate(10);
        $classrooms = Classroom::all();

        return view('attendance.index', compact('attendances', 'classrooms'));
    }

    public function recap(Request $request)
    {
        // Set default date to today if not provided
        $date = $request->input('date', today()->format('Y-m-d'));
        $classroomId = $request->input('classroom_id');

        // Base query with eager loading
        $query = Attendance::with(['student.classroom'])
            ->whereDate('scan_time', $date)
            ->orderBy('scan_time');

        // Filter by classroom if selected
        if ($classroomId) {
            $query->whereHas('student', function ($q) use ($classroomId) {
                $q->where('classroom_id', $classroomId);
            });
        }

        // Get all classrooms for dropdown
        $classrooms = Classroom::orderBy('name')->get();

        // Get attendance statistics
        $totalStudents = $classroomId
            ? Student::where('classroom_id', $classroomId)->count()
            : Student::count();

        $presentOnTime = clone $query;
        $late = clone $query;
        $absent = $totalStudents - $query->count();

        $attendanceStats = [
            'total_students' => $totalStudents,
            'present_on_time' => $presentOnTime->where('status', 'Masuk / Tepat Waktu')->count(),
            'late' => $late->where('status', 'Terlambat / Tidak Tepat Waktu')->count(),
            'absent' => $absent > 0 ? $absent : 0, // Ensure not negative
        ];

        // Paginate results (15 items per page)
        $attendances = $query->paginate(15);

        return view('attendance.recap', [
            'attendances' => $attendances,
            'date' => $date,
            'classrooms' => $classrooms,
            'classroomId' => $classroomId,
            'totalStudents' => $attendanceStats['total_students'],
            'presentOnTime' => $attendanceStats['present_on_time'],
            'late' => $attendanceStats['late'],
            'absent' => $attendanceStats['absent'],
        ]);
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
