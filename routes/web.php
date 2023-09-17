<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//Auth
Route::get('/',[AuthController::class,'index' ])->name('login');
Route::post('/userLogin',[AuthController::class,'userLogin' ])->name('userLogin');
Route::get('/signup',[AuthController::class,'signup' ])->name('signup');
Route::post('/userRegister',[AuthController::class,'userRegister' ])->name('userRegister');


//Home
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');


//Student
Route::get('/student',[StudentController::class,'addstudent'])->name('student');
Route::post('/saveStudent',[StudentController::class,'saveStudent'])->name('saveStudent');
Route::get('/Studentlist',[StudentController::class,'viewStudent'])->name('viewstudent');
Route::get('/editStudent/{id}',[StudentController::class,'editStudent'])->name('editStudent');
Route::post('/updateStudent',[StudentController::class,'updateStudent'])->name('updateStudent');
Route::get('/deleteStudent',[StudentController::class,'deleteStudent'])->name('deleteStudent');



//courses
Route::get('/courses',[CoursesController::class,'addCourses'])->name('courses');
Route::post('/saveCourses',[CoursesController::class,'saveCourses'])->name('saveCourses');
Route::get('/viewCourses',[CoursesController::class,'viewCourses'])->name('viewCourses');
Route::get('/editCourses/{id}',[CoursesController::class,'editCourses'])->name('editCourses');
Route::post('/updateCourses',[CoursesController::class,'updateCourses'])->name('updateCourses');
Route::get('/deleteCourses',[CoursesController::class,'deleteCourses'])->name('deleteCourses');








