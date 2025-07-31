<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'type',
        'description',
        'user_id',
        'subject_id',
        'subject_type',
        'properties'
    ];

    protected $casts = [
        'properties' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->morphTo();
    }

    public function getDescriptionAttribute()
    {
        $descriptions = [
            'student_created' => 'Siswa baru ditambahkan: ' . $this->properties['name'],
            'student_updated' => 'Data siswa diperbarui: ' . $this->properties['name'],
            'attendance_created' => 'Presensi dicatat untuk siswa ID: ' . $this->subject_id,
            // tambahkan mapping lainnya
        ];

        return $descriptions[$this->type] ?? $this->attributes['description'];
    }
}
