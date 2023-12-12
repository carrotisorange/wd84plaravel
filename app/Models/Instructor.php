<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table='instructors';

    public function studentCourses(){
      return $this->hasMany(StudentCourse::class);
    }
}
