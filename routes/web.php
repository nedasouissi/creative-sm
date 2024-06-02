<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\ClassesController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\GradesController;
use App\Http\Controllers\Dashboard\HomeworkController;
use App\Http\Controllers\Dashboard\InformationsController;
use App\Http\Controllers\Dashboard\MarksController;
use App\Http\Controllers\Dashboard\ModulesController;
use App\Http\Controllers\Dashboard\ParentsController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\SubjectsController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\TeachersnotesController;
use Illuminate\Support\Facades\Auth;
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


// Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');;
Route::get('/home', [MainController::class, 'home'])->name('home')->middleware('auth');
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/registerteacher', [RegisterController::class, 'registerTeacher'])->name('register.teacher');
Route::post('/registerparent', [RegisterController::class, 'registerParent'])->name('register.parent');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_auth', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/signout', [LoginController::class, 'logout'])->name('logout');

//parent routes
Route::get('/parents', [ParentsController::class, 'index'])->name('parents.index');
Route::post('/parents', [ParentsController::class, 'store'])->name('parents.store');
Route::get('/parents/{StudentParent}', [ParentsController::class, 'show'])->name('parents.show');
Route::put('/parents/{StudentParent}', [ParentsController::class, 'update'])->name('parents.update');
Route::patch('/parents/{StudentParent}', [ParentsController::class, 'update'])->name('parents.update');
Route::delete('/parents/{StudentParent}', [ParentsController::class, 'destroy'])->name('parents.destroy');
Route::post('/parent/{StudentParent}/toggle-status', [ParentsController::class, 'toggleStatus'])->name('parent.toggleStatus');

//student routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

//teacher routes
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
Route::post('/teacher/{teacher}/toggle-status', [TeacherController::class, 'toggleStatus'])->name('teacher.toggleStatus');

//modules routes
Route::get('/modules', [ModulesController::class, 'index'])->name('modules.index');
Route::post('/modules', [ModulesController::class, 'store'])->name('modules.store');
Route::get('/modules/{module}', [ModulesController::class, 'show'])->name('modules.show');
Route::put('/modules/{module}', [ModulesController::class, 'update'])->name('modules.update');
Route::patch('/modules/{module}', [ModulesController::class, 'update'])->name('modules.update');
Route::delete('/modules/{module}', [ModulesController::class, 'destroy'])->name('modules.destroy');

//subjects routes
Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])->name('subjects.show');
Route::put('/subjects/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');
Route::patch('/subjects/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{subject}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');

//grades routes
Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
Route::get('/grades/{grade}', [GradesController::class, 'show'])->name('grades.show');
Route::put('/grades/{grade}', [GradesController::class, 'update'])->name('grades.update');
Route::patch('/grades/{grade}', [GradesController::class, 'update'])->name('grades.update');
Route::delete('/grades/{grade}', [GradesController::class, 'destroy'])->name('grades.destroy');

//classes routes
Route::get('/classes', [ClassesController::class, 'index'])->name('classes.index');
Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
Route::get('/classes/{class}', [ClassesController::class, 'show'])->name('classes.show');
Route::put('/classes/{class}', [ClassesController::class, 'update'])->name('classes.update');
Route::patch('/classes/{class}', [ClassesController::class, 'update'])->name('classes.update');
Route::delete('/classes/{class}', [ClassesController::class, 'destroy'])->name('classes.destroy');

//homework routes
Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');
Route::post('/homework', [HomeworkController::class, 'store'])->name('homework.store');
Route::get('/homework/{homework}', [HomeworkController::class, 'show'])->name('homework.show');
Route::put('/homework/{homework}', [HomeworkController::class, 'update'])->name('homework.update');
Route::patch('/homework/{homework}', [HomeworkController::class, 'update'])->name('homework.update');
Route::delete('/homework/{homework}', [HomeworkController::class, 'destroy'])->name('homework.destroy');

//Info routes
Route::get('/information', [InformationsController::class, 'index'])->name('info.index');
Route::post('/information', [InformationsController::class, 'store'])->name('info.store');
Route::get('/information/{information}', [InformationsController::class, 'show'])->name('info.show');
Route::put('/information/{information}', [InformationsController::class, 'update'])->name('info.update');
Route::patch('/information/{information}', [InformationsController::class, 'update'])->name('info.update');
Route::delete('/information/{information}', [InformationsController::class, 'destroy'])->name('info.destroy');

//marks routes
Route::get('/marks', [MarksController::class, 'index'])->name('marks.index');
Route::post('/marks', [MarksController::class, 'store'])->name('marks.store');
Route::get('/marks/{mark}', [MarksController::class, 'show'])->name('marks.show');
Route::put('/marks/{mark}', [MarksController::class, 'update'])->name('marks.update');
Route::patch('/marks/{mark}', [MarksController::class, 'update'])->name('marks.update');
Route::delete('/marks/{mark}', [MarksController::class, 'destroy'])->name('marks.destroy');

//teacher notes routes
Route::get('/teachers-notes', [TeachersnotesController::class, 'index'])->name('teachers-notes.index');
Route::post('/teachers-notes', [TeachersnotesController::class, 'store'])->name('teachers-notes.store');
Route::get('/teachers-notes/{teachersNote}', [TeachersnotesController::class, 'show'])->name('teachers-notes.show');
Route::put('/teachers-notes/{teachersNote}', [TeachersnotesController::class, 'update'])->name('teachers-notes.update');
Route::patch('/teachers-notes/{teachersNote}', [TeachersnotesController::class, 'update'])->name('teachers-notes.update');
Route::delete('/teachers-notes/{teachersNote}', [TeachersnotesController::class, 'destroy'])->name('teachers-notes.destroy');




// Route::group(['namespace' => 'Dashboard'], function () {
//     Route::resource('/parent', 'ParentsController');
//     Route::resource('/student', 'StudentController');
//     Route::resource('/teacher', 'TeacherController');
//     Route::resource('/modules', 'ModulesController');
//     Route::resource('/subjects', 'SubjectsController');
//     Route::resource('/grades', 'GradesController');
//     Route::resource('/classes', 'ClassesController');
//     Route::resource('/homework', 'HomeworkController');
//     Route::resource('/profile', 'ProfileController');
// });
