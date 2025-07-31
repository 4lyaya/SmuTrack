<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run()
    {
        $majors = Major::all();

        foreach ($majors as $major) {
            for ($i = 1; $i <= 3; $i++) {
                Classroom::create([
                    'name' => "X {$major->code} {$i}",
                    'major_id' => $major->id,
                    'teacher_id' => Teacher::inRandomOrder()->first()->id,
                ]);

                Classroom::create([
                    'name' => "XI {$major->code} {$i}",
                    'major_id' => $major->id,
                    'teacher_id' => Teacher::inRandomOrder()->first()->id,
                ]);

                Classroom::create([
                    'name' => "XII {$major->code} {$i}",
                    'major_id' => $major->id,
                    'teacher_id' => Teacher::inRandomOrder()->first()->id,
                ]);
            }
        }
    }
}
