<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            $students = Student::paginate(10);
            // DB::table('students')->paginate(10);

            return view('students.index',compact('students'));
        }
        else{
            return 'Restricted page';
        }

    }

    public function show($id){
        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            $student = Student::find($id);

            return view('students.show',compact('student'));
        }
        else{
            return 'Restricted page';
        }
    }

    public function edit($id){
        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            $student = Student::find($id);

            return view('students.edit',compact('student'));
        }
        else{
            return 'Restricted page';
        }
    }

    public function create(){
        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            return view('students.create');
        }
        else{
            return 'Restricted page';
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:25',
            'age' => 'required|integer|min:1|max:100',
            'address' => 'required|min:10|max:50'
        ]);

        $student = Student::create($validatedData);

        return redirect('/student/'.$student->id)->with('success', 'Success!');
    }
}
