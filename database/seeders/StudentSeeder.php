<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $classrooms = Classroom::all();

        foreach ($classrooms as $classroom) {
            for ($i = 1; $i <= 20; $i++) {
                Student::create([
                    'nis' => 'S' . $classroom->id . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'name' => 'Siswa ' . $classroom->name . ' ' . $i,
                    'classroom_id' => $classroom->id,
                    'fingerprint_id' => uniqid(),
                ]);
            }
        }
    }
}
