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
            $col->enum('gender',['Boy','Girl']);
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
            $col->enum('gender', ['Boy', 'Girl']);
            $col->date('birth_date');
            $col->string('email')->unique();
            $col->string('phone');
            $col->string('address');
            $col->date('enrl_date');
            $col->string('g_level');
            $col->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $col->timestamps();

        });

        Schema::create('courses', function(Blueprint $col){
            $col->id();
            $col->string('c_code')->unique();
            $col->string('c_name');
            $col->string('des');
            $col->integer('credit');
            $col->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $col->timestamps();
        });

        Schema::create('assignments', function(Blueprint $col){
            $col->id();
            $col->foreignId('course_id')->constrained()->onDelete('cascade');
            $col->foreignId('student_id')->constrained()->onDelete('cascade');
            $col->string('title');
            $col->string('description');
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
