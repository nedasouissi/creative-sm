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


Route::get('/', function () {
    return view('welcome');
});


// Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');;
Route::get('/home', [MainController::class, 'home'])->name('home')->middleware('auth');
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard')->middleware('checkRole');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/registerteacher', [RegisterController::class, 'registerTeacher'])->name('register.teacher');
Route::post('/registerparent', [RegisterController::class, 'registerParent'])->name('register.parent');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_auth', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/signout', [LoginController::class, 'logout'])->name('logout');

//parent routes
Route::get('/parents', [ParentsController::class, 'index'])->name('parents.index');
Route::post('/parents', [ParentsController::class, 'store'])->name('parents.store');
Route::get('/parents/{Student}', [ParentsController::class, 'show'])->name('parents.show');
Route::put('/parents/{Student}', [ParentsController::class, 'update'])->name('parents.update');
Route::delete('/parents/{Student}', [ParentsController::class, 'destroy'])->name('parents.destroy');
Route::post('/parent/{Student}/toggle-status', [ParentsController::class, 'toggleStatus'])->name('parent.toggleStatus');

//student routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

//teacher routes
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
Route::post('/teacher/{teacher}/toggle-status', [TeacherController::class, 'toggleStatus'])->name('teacher.toggleStatus');

//modules routes
Route::get('/modules', [MainController::class, 'modules_index'])->name('modules.index');
Route::post('/modules', [MainController::class, 'store_modules'])->name('modules.store');
Route::get('/modules/{module}', [MainController::class, 'show_modules'])->name('modules.show');
Route::put('/modules/{module}', [MainController::class, 'update_modules'])->name('modules.update');
Route::delete('/modules/{module}', [MainController::class, 'destroy_modules'])->name('modules.destroy');

//subjects routes
Route::get('/subjects', [MainController::class, 'subjects_index'])->name('subjects.index');
Route::post('/store-subjects', [MainController::class, 'store_subjects'])->name('subjects.store');
Route::get('/subjects/{subject}', [MainController::class, 'show_subjects'])->name('subjects.show');
Route::put('/subjects/{subject}', [MainController::class, 'update_subjects'])->name('subjects.update');
Route::delete('/subjects/{subject}', [MainController::class, 'destroy_subjects'])->name('subjects.destroy');

//grades routes
Route::get('/grades', [MainController::class, 'grades_index'])->name('grades.index');
Route::post('/grades', [MainController::class, 'store_grades'])->name('grades.store');
Route::get('/grades/{grade}', [MainController::class, 'show_gardes'])->name('grades.show');
Route::put('/grades/{grade}', [MainController::class, 'update_grades'])->name('grades.update');
Route::delete('/grades/{grade}', [MainController::class, 'destroy_grades'])->name('grades.destroy');

//classes routes
Route::get('/classes', [MainController::class, 'classes_index'])->name('classes.index');
Route::post('/classes', [MainController::class, 'store_classes'])->name('classes.store');
Route::get('/classes/{class}', [MainController::class, 'show_classes'])->name('classes.show');
Route::put('/classes/{class}', [MainController::class, 'update_classes'])->name('classes.update');
Route::delete('/classes/{class}', [MainController::class, 'destroy_classes'])->name('classes.destroy');

//homework routes
Route::get('/homework', [MainController::class, 'homework_index'])->name('homework.index');
Route::post('/homework', [MainController::class, 'store_homework'])->name('homework.store');
Route::get('/homework/{homework}', [MainController::class, 'show_homework'])->name('homework.show');
Route::put('/homework/{homework}', [MainController::class, 'update_homework'])->name('homework.update');
Route::delete('/homework/{homework}', [MainController::class, 'destroy_homework'])->name('homework.destroy');

//Info routes
Route::get('/information', [MainController::class, 'info_index'])->name('info.index');
Route::post('/information', [MainController::class, 'store_information'])->name('info.store');
Route::get('/information/{information}', [MainController::class, 'show_information'])->name('info.show');
Route::put('/information/{information}', [MainController::class, 'update_information'])->name('info.update');
Route::delete('/information/{information}', [MainController::class, 'destroy_information'])->name('info.destroy');

//marks routes
Route::get('/marks', [MainController::class, 'marks_index'])->name('marks.index');
Route::post('/marks', [MainController::class, 'store_marks'])->name('marks.store');
Route::get('/marks/{mark}', [MainController::class, 'show_marks'])->name('marks.show');
Route::put('/marks/{mark}', [MainController::class, 'update_marks'])->name('marks.update');
Route::delete('/marks/{mark}', [MainController::class, 'destroy_marks'])->name('marks.destroy');

//teacher notes routes
Route::get('/teachers-notes', [MainController::class, 'notes_index'])->name('teachers-notes.index');
Route::post('/teachers-notes', [MainController::class, 'store_notes'])->name('teachers-notes.store');
Route::get('/teachers-notes/{teachersNote}', [MainController::class, 'show_notes'])->name('teachers-notes.show');
Route::put('/teachers-notes/{teachersNote}', [MainController::class, 'update_notes'])->name('teachers-notes.update');
Route::delete('/teachers-notes/{teachersNote}', [MainController::class, 'destroy_notes'])->name('teachers-notes.destroy');




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
