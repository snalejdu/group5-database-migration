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

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Many-to-many with extra fields (pivot = assignments)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'assignments')
                    ->withPivot('title', 'description', 'due_date', 'max_score')
                    ->withTimestamps();
    }

    // Direct access to assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
