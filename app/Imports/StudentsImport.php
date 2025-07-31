<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([
            'nis' => $row['nis'],
            'name' => $row['name'],
            'classroom_id' => $row['classroom_id'],
            'fingerprint_id' => $row['fingerprint_id'],
        ]);
    }
}
