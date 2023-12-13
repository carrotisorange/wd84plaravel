<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();

        return $courses;
    }

    public function show($id){
        $course = Course::find($id);

        return $course;
    }

    public function create(){
        //
    }

    public function store(Request $request){

        //validate the inputs
        $validated = $request->validate([
            'course' => 'required|string|min:2|max:25',
            'schedule' => 'required|string|min:5|max:10',
            'is_active_flag' => 'required|boolean'
        ]);

        //insert new entry
        $course = Course::create($validated);

        return $course;

    }

    public function edit($id){
        $course = Course::find($id);

        return $course;
    }

    public function update(Request $request, $id){
        
        //validate the inputs
        $validated = $request->validate([
            'course' => 'required|string|min:2|max:25',
            'schedule' => 'required|string|min:5|max:10',
            'is_active_flag' => 'required|boolean'
        ]);
        //update the entry
        $course = Course::where('id', $id)->update($validated);

        return $course;
    }

    public function destroy($id){
        $course = Course::where('id', $id)->delete();

        return $course;
    }

}
