<?php

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


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')-> middleware('verified');
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
Route::view('/register','register')->name('register');
Route::view('/login','login')->name('login');


Route::group(['namespace'=>'Dashboard'], function (){
Route::resource('/parent','ParentsController');
Route::resource('/student','StudentController');
Route::resource('/teacher','TeacherController');
Route::resource('/modules','ModulesController');
Route::resource('/subjects','SubjectsController');
Route::resource('/grades','GradesController');
Route::resource('/classes','ClassesController');
Route::resource('homework','HomeworkController');

//Teachers Routes
 //   Route::get('/teachers-enrolled', 'TeacherController@index')->name('teacher.index');
    //Route::POST('/teachers/store', 'teacherController@store')->name('teacher.store');

//Parents Routes

//Info routes
    Route::get('/information', 'InformationsController@index')->name('info.index');

// Homework routes
  //  Route::get('/homework', 'HomeworkController@index')->name('homework.index');

// Modules routes
  //  Route::get('/modules', 'ModulesController@index')->name('modules.index');

//Subjects routes
   // Route::get('/subjects', 'SubjectsController@index')->name('subjects.index');

//Classes routes
   // Route::get('/classes', 'ClassesController@index')->name('classes.index');

// Grades routes
   // Route::get('/grades', 'GradesController@index')->name('grades.index');

//Marks routes
    Route::get('/marks', 'MarksController@index')->name('marks.index');

// Teachers notes routes
    Route::get('/teachers-notes', 'TeachersnotesController@index')->name('teachers-notes.index');
});


