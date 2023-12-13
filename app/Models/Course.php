<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table='courses';

    protected $fillable = [
        'course',
        'schedule',
        'is_active_flag',
    ];

    public function studentCourses(){
       return $this->hasMany(StudentCourse::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }
}
