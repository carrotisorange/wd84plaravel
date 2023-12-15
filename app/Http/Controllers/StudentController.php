<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $currentUserRole = auth()->user()->role->role;

        if($currentUserRole == 'admin'){
            $students = Student::all();

            return view('courses.index',compact('students'));
        }
        else{
            return 'Restricted page';
        }

    ;
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
