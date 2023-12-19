<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $table = 'students_courses';

    protected $fillable = [
        'student_id',
        'instructor_id',
        'course_id'
    ];

    protected $attributes = [
        'is_active_flag' => 1
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id')->withDefault();
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id')->withDefault();
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class, 'instructor_id')->withDefault();
    }
}
