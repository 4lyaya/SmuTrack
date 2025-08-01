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
        $lateThreshold = '07:00:00'; // Batas waktu terlambat
        $endOfMorning = '12:00:00';  // Batas akhir waktu absen pagi

        if ($scanHour < $lateThreshold) {
            return 'Masuk / Tepat Waktu';
        } elseif ($scanHour >= $lateThreshold && $scanHour < $endOfMorning) {
            return 'Terlambat / Tidak Tepat Waktu';
        } else {
            return 'Tidak Masuk';
        }
    }
}
