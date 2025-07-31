<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run()
    {
        $majors = [
            ['name' => 'Teknik Kendaraan Ringan', 'code' => 'TKR'],
            ['name' => 'Teknik dan Bisnis Sepeda Motor', 'code' => 'TBSM'],
            ['name' => 'Teknik Komputer dan Jaringan', 'code' => 'TKJ'],
            ['name' => 'Rekayasa Perangkat Lunak', 'code' => 'RPL'],
            ['name' => 'Teknik Pengelasan dan Fabrikasi Logam', 'code' => 'TPFL'],
            ['name' => 'Keperawatan', 'code' => 'KPR'],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
