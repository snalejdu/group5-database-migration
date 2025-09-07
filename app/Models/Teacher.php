<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'gender', 'email',
        'phone', 'dept', 'hire_date'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'teacher_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id', 'id');
    }
}
