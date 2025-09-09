<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function(Blueprint $col){
            $col->id();
            $col->string('fname');
            $col->string('lname');
            $col->enum('gender',['Male','Female','Other']);
            $col->string('email')->unique();
            $col->string('phone');
            $col->string('dept');
            $col->date('hire_date');
            $col->timestamps();
        });

        Schema::create('students', function(Blueprint $col){
            $col->id();
            $col->string('fname');
            $col->string('lname');
            $col->enum('gender', ['Male', 'Female', 'Other']);
            $col->date('birth_date');
            $col->string('email')->unique();
            $col->string('phone');
            $col->string('address');
            $col->date('enrl_date');
            $col->string('g_level');
            $col->timestamps();
        });

        Schema::create('courses', function(Blueprint $col){
            $col->id();
            $col->string('c_code')->unique();
            $col->string('c_name');
            $col->text('description');
            $col->integer('credit');
            $col->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $col->timestamps();
        });

        // Assignments act as the pivot between Students and Courses
        Schema::create('assignments', function(Blueprint $col){
            $col->id();
            $col->foreignId('student_id')->constrained()->onDelete('cascade');
            $col->foreignId('course_id')->constrained()->onDelete('cascade');
            // assignment details
            $col->string('title');
            $col->text('description');
            $col->date('due_date');
            $col->integer('max_score');
            $col->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('students');
        Schema::dropIfExists('teachers');
    }
};
