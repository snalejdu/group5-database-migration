<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'gender', 'birth_date', 'email',
        'phone', 'address', 'enrl_date', 'g_level'
    ];

    // A student receives many assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
