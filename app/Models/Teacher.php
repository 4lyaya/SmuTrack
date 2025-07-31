<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'name', 'major_id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
