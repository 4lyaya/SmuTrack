<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $todayAttendances = Attendance::whereDate('scan_time', Carbon::today())->count();

        // Get attendance data for last 7 days
        $attendanceData = $this->getLast7DaysAttendance();

        // Get class distribution data
        $classDistribution = $this->getClassDistribution();

        // Get recent activities
        $activities = Activity::latest()
            ->with('user')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'todayAttendances' => $todayAttendances,
            'chartData' => [
                'attendanceData' => $attendanceData,
                'classDistribution' => $classDistribution
            ],
            'activities' => $activities
        ]);
    }

    protected function getLast7DaysAttendance()
    {
        $dates = [];
        $presentData = [];
        $lateData = [];
        $absentData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dateString = $date->format('Y-m-d');
            $dates[] = $date->isoFormat('ddd, D MMM'); // Format: Mon, 1 Jan

            // Count attendance statuses for each day
            $presentData[] = Attendance::whereDate('scan_time', $dateString)
                ->where('status', 'Masuk / Tepat Waktu')
                ->count();

            $lateData[] = Attendance::whereDate('scan_time', $dateString)
                ->where('status', 'Terlambat / Tidak Tepat Waktu')
                ->count();

            // For absent, we need to calculate students who didn't attend
            $totalStudents = Student::count();
            $present = $presentData[count($presentData) - 1] + $lateData[count($lateData) - 1];
            $absentData[] = max(0, $totalStudents - $present); // Ensure not negative
        }

        return [
            'dates' => $dates,
            'present' => $presentData,
            'late' => $lateData,
            'absent' => $absentData
        ];
    }

    protected function getClassDistribution()
    {
        $classDistribution = Student::select('classroom_id', DB::raw('count(*) as total'))
            ->with('classroom')
            ->groupBy('classroom_id')
            ->get();

        $labels = [];
        $data = [];

        foreach ($classDistribution as $item) {
            $labels[] = $item->classroom ? $item->classroom->name : 'Belum Ada Kelas';
            $data[] = $item->total;
        }

        // If no data, show empty state
        if (empty($data)) {
            $labels = ['Belum Ada Data'];
            $data = [0];
        }

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }

    public function getAttendanceStats(Request $request)
    {
        $period = $request->query('period', 'week');

        if ($period === 'month') {
            $data = $this->getLast30DaysAttendance();
        } else {
            $data = $this->getLast7DaysAttendance();
        }

        return response()->json($data);
    }

    protected function getLast30DaysAttendance()
    {
        // Similar to getLast7DaysAttendance but for 30 days
        // Implement as needed
        return [];
    }
}