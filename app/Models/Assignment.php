<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'course_id', 'student_id',
        'title', 'description', 'due_date', 'max_score', 'score'
    ];

    // Assignment belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Assignment belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Assignment belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
