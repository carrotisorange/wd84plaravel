<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
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
//get requests
Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::get('/student/{id}/edit', [StudentController::class, 'edit']);
Route::get('/student', [StudentController::class, 'edit']);

//route for the studentcourse
Route::get('studentcourse/{id}', [StudentCourseController::class, 'show']);


require __DIR__.'/auth.php';
