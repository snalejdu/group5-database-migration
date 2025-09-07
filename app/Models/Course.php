<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_code', 'c_name', 'des', 'credit', 'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'course_id', 'id');
    }
}
