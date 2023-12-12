<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;
use App\Models\Instructor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentCourse>
 */
class StudentCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => Student::all()->random()->id,
            'course_id' => Course::all()->random()->id,
            'instructor_id' => Instructor::all()->random()->id,
            'grade' => rand(75,99),
            'is_active_flag' => rand(0,1)
        ];
    }
}
