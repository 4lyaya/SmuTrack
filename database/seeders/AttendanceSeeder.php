<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Student;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua siswa (bisa dibatasi jika perlu)
        $students = Student::take(5)->get(); // Ambil 5 siswa pertama

        foreach ($students as $student) {
            // Contoh: simulasikan scan_time berbeda untuk setiap siswa
            $randomHour = rand(6, 8);  // antara jam 6 dan 8
            $randomMinute = rand(0, 59);

            $scanTime = Carbon::create(
                2025,
                8,
                1,
                $randomHour,
                $randomMinute,
                0,
                'Asia/Jakarta'
            );

            $status = $scanTime->format('H:i:s') < '07:00:00' ? 'tepat waktu' : 'terlambat';

            DB::table('attendances')->insert([
                'student_id' => $student->id,
                'scan_time' => $scanTime,
                'status' => $status,
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ]);
        }
    }
}
