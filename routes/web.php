<?php

use App\Http\Controllers\Auth\LoginController;
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


Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
Route::view('/register', 'register')->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::group(['namespace' => 'Dashboard'], function () {
    Route::resource('/parent', 'ParentsController');
    Route::resource('/student', 'StudentController');
    Route::resource('/teacher', 'TeacherController');
    Route::resource('/modules', 'ModulesController');
    Route::resource('/subjects', 'SubjectsController');
    Route::resource('/grades', 'GradesController');
    Route::resource('/classes', 'ClassesController');
    Route::resource('/homework', 'HomeworkController');
    Route::resource('/profile', 'ProfileController');
    //Teachers Routes
    Route::post('/teacher/{id}/toggle-status', 'TeacherController@toggleStatus');
    //students routes
    Route::post('student/{id}/update', 'Dashboard\StudentController@update')->name('student.update');
    Route::post('parent/{id}/toggle-status', 'Dashboard\ParentsController@toggleStatus')->name('parent.toggle-status');
    Route::get('parent/{id}', 'Dashboard\ParentsController@show')->name('parent.show');
    //Parents Routes
    Route::post('/parent/{StudentParent}/toggle-status', 'ParentsController@toggleStatus');

    //Info routes
    Route::get('/information', 'InformationsController@index')->name('info.index');

    //Marks routes
    Route::get('/marks', 'MarksController@index')->name('marks.index');

    // Teachers notes routes
    Route::get('/teachers-notes', 'TeachersnotesController@index')->name('teachers-notes.index');

    // Homework routes


});
