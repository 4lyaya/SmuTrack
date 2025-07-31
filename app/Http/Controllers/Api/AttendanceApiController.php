<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fingerprint_id' => 'required|exists:students,fingerprint_id',
        ]);

        $student = Student::where('fingerprint_id', $request->fingerprint_id)->first();
        $scanTime = Carbon::now();

        $attendance = Attendance::create([
            'student_id' => $student->id,
            'scan_time' => $scanTime,
            'status' => Attendance::determineStatus($scanTime),
        ]);

        return response()->json([
            'message' => 'Attendance recorded successfully',
            'data' => [
                'student_name' => $student->name,
                'classroom' => $student->classroom->name,
                'scan_time' => $scanTime->format('Y-m-d H:i:s'),
                'status' => $attendance->status,
            ]
        ], 201);
    }
}
