<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourse;

class StudentCourseController extends Controller
{
    public function index(){

        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            $studentsCourses = StudentCourse::paginate(100);
            // DB::table('students')->paginate(10);

            return view('studentscourses.index',compact('studentsCourses'));
        }
        else{
            return 'Restricted page';
        }

    }
}
