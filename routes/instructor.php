<?php

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
Route::group(['prefix' => 'instructor'], function () {
    Route::get('/all','CourseController@getInstructors')->name('instructors');
    Route::get('/{id}','CourseController@getInstructor')->where(['id'=>'[0-9]+'])->name('instructor');
});
Route::group(['prefix' => 'instructor','namespace'=>'instructors','middleware'=>['studentRedirect','instructorRedirect']], function () {

    Route::get('/login','InstructorAuthController@log')->name('instructor.log');
    Route::post('/login','InstructorAuthController@doLog')->name('instructor.doLog');
    Route::get('/register','InstructorAuthController@register')->name('instructor.register');
    Route::post('/register','InstructorAuthController@doRegister')->name('instructor.doRegister');
});
//

Route::group(['prefix' => 'instructor','namespace'=>'instructors','middleware'=>['instructorAuth']], function () {
    Route::get('/dashboard','InstructorController@index')->name('instructor.dashboard');
    Route::get('/logout','InstructorAuthController@logout')->name('instructor.logout');
    Route::get('/add/course','InstructorController@add')->name('instructor.add');
    Route::post('/add/course','InstructorController@save')->name('instructor.save');
    Route::get('/add/lecture/{courseId}','InstructorController@lectureAdd')->where(['courseId'=>'[0-9]+'])->name('instructor.lecture.add');
    Route::post('/add/lecture','InstructorController@lectureSave')->name('instructor.lecture.save');

});
