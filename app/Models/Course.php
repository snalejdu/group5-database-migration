<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_code', 'c_name', 'description', 'credit', 'teacher_id'
    ];

    // A course belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // A course has many assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
