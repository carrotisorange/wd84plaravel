<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourse;

class StudentCourseController extends Controller
{
    public function show($id){
        $studentCourse = StudentCourse::find($id);

        return $studentCourse->instructor->name;
    }
}
