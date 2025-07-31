<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'scan_time', 'status'];

    protected $casts = [
        'scan_time' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function determineStatus($scanTime)
    {
        $scanHour = $scanTime->format('H:i:s');

        if ($scanHour < '07:00:00') {
            return 'Masuk / Tepat Waktu';
        } elseif ($scanHour >= '07:00:00' && $scanHour < '12:00:00') {
            return 'Terlambat / Tidak Tepat Waktu';
        } else {
            return 'Tidak Masuk';
        }
    }
}
