<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'gender', 'birth_date',
        'email', 'phone', 'address', 'enrl_date',
        'g_level', 'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'assignments')
                    ->withPivot('title', 'description', 'due_date', 'max_score')
                    ->withTimestamps();
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}

