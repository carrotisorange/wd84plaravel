<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Student::factory(100)->create();
        // \App\Models\Course::factory(50)->create();
        // \App\Models\Instructor::factory(20)->create();
        // \App\Models\StudentCourse::factory(100)->create();
        // \App\Models\Loan::factory(200)->create();
        // \App\Models\Payment::factory(400)->create();
    }
}
