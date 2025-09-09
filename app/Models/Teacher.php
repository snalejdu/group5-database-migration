<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'gender', 'email', 'phone', 'dept', 'hire_date'
    ];

    // A teacher teaches many courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // A teacher gives many assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
