<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Teachers Table
        Schema::create('teachers', function (Blueprint $col) {
            $col->id();
            $col->string('fname');
            $col->string('lname');
            $col->enum('gender', ['Boy', 'Girl']);
            $col->string('email')->unique();
            $col->string('phone');
            $col->string('dept');
            $col->date('hire_date');
            $col->timestamps();
        });

        // Students Table
        Schema::create('students', function (Blueprint $col) {
            $col->id();
            $col->string('fname');
            $col->string('lname');
            $col->enum('gender', ['Boy', 'Girl']);
            $col->date('birth_date');
            $col->string('email')->unique();
            $col->string('phone');
            $col->string('address');
            $col->date('enrl_date');
            $col->string('g_level');
            $col->timestamps();
        });

        // Courses Table
        Schema::create('courses', function (Blueprint $col) {
            $col->id();
            $col->string('c_code')->unique();
            $col->string('c_name');
            $col->text('description');
            $col->integer('credit');
            $col->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $col->timestamps();
        });


        Schema::create('assignments', function (Blueprint $col) {
            $col->id();
            $col->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $col->foreignId('course_id')->constrained()->onDelete('cascade');
            $col->foreignId('student_id')->constrained()->onDelete('cascade');
            $col->string('title');
            $col->text('description');
            $col->date('due_date');
            $col->integer('max_score');
            $col->integer('score')->nullable();
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

