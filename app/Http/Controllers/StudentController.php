<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\{Student, Payment, Loan, StudentCourse, Course, Instructor};

class StudentController extends Controller
{
    public function index(){

        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
            return view('students.index');
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

            $studentsCourses = $student->studentCourses()->get();

            $loans = $student->loans()->get();

            $payments = $student->payments()->get();

            return view('students.show',compact('student','studentsCourses','loans','payments'));
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

            $courses = Course::where('is_active_flag', 1)->get();

            $instructors = Instructor::all();

            return view('students.create', compact('courses', 'instructors'));
        }
        else{
            return 'Restricted page';
        }
    }

    public function store(Request $request){
        //validate the inputs
        try{
            //implementation of the atomic principle
            DB::beginTransaction();
                $validatedStudentData = $request->validate([
                    'name' => 'required|min:2|max:25',
                    'age' => 'required|integer|min:1|max:100',
                    'address' => 'required|min:10|max:50'
                ]);

                $validatedCourseAndInstructorData = $request->validate([
                    'course_id' => ['required', Rule::exists('courses', 'id')],
                    'instructor_id' => ['required', Rule::exists('instructors', 'id')]
                ]);

                //insert the new student
                $student = Student::create($validatedStudentData);
                $validatedCourseAndInstructorData['student_id'] = $student->id;

                StudentCourse::create($validatedCourseAndInstructorData);

                DB::commit();

                //redirect to the new page
                return redirect('/student/'.$student->id)->with('success', 'Success!');


        }catch(\Exception $e){
            DB::rollBack();
        }

    }

    public function update(Request $request, $id){

        //validate the inputs
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:25',
            'age' => 'required|integer|min:1|max:100',
            'address' => 'required|min:10|max:50'
        ]);

        //insert the  new student
        $student = Student::where('id', $id)->update($validatedData);

        //redirect to the new page
        return redirect('/student/'.$id)->with('success', 'Success!');
    }

    public function destroy($id){
        try{
            //implementation of the atomic principle
            DB::beginTransaction();
                StudentCourse::where('student_id', $id)->delete();
                Loan::where('student_id', $id)->delete();
                Payment::where('student_id',$id )->delete();
                Student::where('id', $id)->delete();
            DB::commit();

            return redirect('/students')->with('success', 'Success!');

        }catch(\Exception $e){
            DB::rollBack();
        }
    }
}
