<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('attendances')->insert([
            [
                'student_id' => 1,
                'scan_time' => Carbon::create(2025, 7, 31, 6, 45, 0),
                'status' => 'tepat waktu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'scan_time' => Carbon::create(2025, 7, 31, 7, 5, 0),
                'status' => 'terlambat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'scan_time' => Carbon::create(2025, 7, 31, 12, 5, 0),
                'status' => 'tidak masuk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
