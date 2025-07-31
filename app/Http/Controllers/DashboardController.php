<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $todayAttendances = Attendance::whereDate('scan_time', Carbon::today())->count();

        // Ambil data kehadiran 7 hari terakhir
        $attendanceData = $this->getLast7DaysAttendance();

        // Ambil data distribusi kelas dari database
        $classDistribution = Student::select('classroom_id', DB::raw('count(*) as total'))
            ->with('classroom') // eager loading relasi classroom
            ->groupBy('classroom_id')
            ->get();

        $chartLabels = [];
        $chartData = [];

        foreach ($classDistribution as $item) {
            $chartLabels[] = $item->classroom ? $item->classroom->name : 'Belum Ada Kelas';
            $chartData[] = $item->total;
        }

        // Jika tidak ada data, tampilkan pesan
        if (empty($chartData)) {
            $chartLabels = ['Belum Ada Data'];
            $chartData = [0];
        }

        // Data untuk JavaScript
        $chartData = [
            'attendanceData' => $attendanceData,
            'classDistribution' => [
                'labels' => $chartLabels,
                'data' => $chartData
            ],
            'totalStudents' => $totalStudents,
            'totalStudentsFormatted' => number_format($totalStudents)
        ];

        $activities = Activity::latest()
            ->with('user')
            ->limit(1)
            ->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'todayAttendances',
            'chartData',
            'activities'
        ));
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
            $dates[] = $date->isoFormat('dddd'); // Nama hari

            $presentData[] = Attendance::whereDate('created_at', $dateString)
                ->where('status', 'present')
                ->count();

            $lateData[] = Attendance::whereDate('created_at', $dateString)
                ->where('status', 'late')
                ->count();

            $absentData[] = Attendance::whereDate('created_at', $dateString)
                ->where('status', 'absent')
                ->count();
        }

        return [
            'dates' => $dates,
            'present' => $presentData,
            'late' => $lateData,
            'absent' => $absentData
        ];
    }

    public function getAttendanceStats(Request $request)
    {
        $period = $request->query('period', 'week');

        if ($period === 'month') {
            // Logika untuk data bulanan
            $data = $this->getLast30DaysAttendance();
        } else {
            // Logika untuk data mingguan
            $data = $this->getLast7DaysAttendance();
        }

        return response()->json($data);
    }

    protected function getClassDistribution()
    {
        // Contoh data - sesuaikan dengan model dan database Anda
        // Ini bisa diganti dengan query database yang sesuai
        // return [
        //     'labels' => ["TKR", "TBSM", "TKJ", "RPL", "TPFL"],
        //     'data' => [44, 55, 41, 17, 15]
        // ];
    }
}
