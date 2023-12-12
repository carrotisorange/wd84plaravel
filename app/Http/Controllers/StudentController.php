<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        return $students;
    }

    public function show($id){
        $student = Student::find($id);
        
        // $courses = $student->studentCourses;
        // return $courses;

        // foreach($courses as $course){
        //     return($course->courses);
        // }

    }
}
