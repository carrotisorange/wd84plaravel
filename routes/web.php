<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//route for the student
Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::get('/student/{id}/edit', [StudentController::class, 'edit']);
Route::get('/student/', [StudentController::class, 'create']);
Route::post('/student/', [StudentController::class, 'store']);
Route::put('/student/{id}/update', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);

//route for the studentcourse
Route::get('/studentcourse', [StudentCourseController::class, 'index']);
Route::get('/studentcourse/{id}', [StudentCourseController::class, 'show']);
Route::get('/studentcourse/{id}/edit', [StudentCourseController::class, 'edit']);
Route::get('/studentcourse/', [StudentCourseController::class, 'create']);
Route::post('/studentcourse/', [StudentCourseController::class, 'store']);
Route::put('/studentcourse/{id}/update', [StudentCourseController::class, 'update']);
Route::delete('/studentcourse/{id}', [StudentCourseController::class, 'destroy']);


//routes for courses
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'show']);
Route::get('/course/{id}/edit', [CourseController::class, 'edit']);
Route::get('/course/', [CourseController::class, 'create']);
Route::post('/course/', [CourseController::class, 'store']);
Route::put('/course/{id}/update', [CourseController::class, 'update']);
Route::delete('/course/{id}', [CourseController::class, 'destroy']);

//routes for loans
Route::get('/loans', [LoanController::class, 'index']);
Route::get('/loan/{id}', [LoanController::class, 'show']);
Route::get('/loan/{id}/edit', [LoanController::class, 'edit']);
Route::get('/loan/', [LoanController::class, 'create']);
Route::post('/loan/', [LoanController::class, 'store']);
Route::put('/loan/{id}/update', [LoanController::class, 'update']);
Route::delete('/loan/{id}', [LoanController::class, 'destroy']);

//routes for instructors
Route::get('/instructors', [InstructorController::class, 'index']);
Route::get('/instructor/{id}', [InstructorController::class, 'show']);
Route::get('/instructor/{id}/edit', [InstructorController::class, 'edit']);
Route::get('/instructor/', [InstructorController::class, 'create']);
Route::post('/instructor/', [InstructorController::class, 'store']);
Route::put('/instructor/{id}/update', [InstructorController::class, 'update']);
Route::delete('/instructor/{id}', [InstructorController::class, 'destroy']);

//routes for payments
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payment/{id}', [PaymentController::class, 'show']);
Route::get('/payment/{id}/edit', [PaymentController::class, 'edit']);
Route::get('/payment/', [PaymentController::class, 'create']);
Route::post('/payment/', [PaymentController::class, 'store']);
Route::put('/payment/{id}/update', [PaymentController::class, 'update']);
Route::delete('/payment/{id}', [PaymentController::class, 'destroy']);


require __DIR__.'/auth.php';
