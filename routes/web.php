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




//courses

Route::get('/','CourseController@index')->name('home');
Route::post('/email/send','EmailController@send')->name('sendFeedback');

Route::group(['prefix' => 'course'], function () {
    Route::get('/all','CourseController@getCourses')->name('courses');
    Route::get('/{id}','CourseController@getCourse')->where(['id'=>'[0-9]+'])->name('course');
    Route::post('/search','CourseController@searchCourse')->name('course.search');
    Route::post('/review/add','CourseController@addReview')->name('course.addReview')->middleware('studentAuth');
});//->middleware('studentAuth')

Route::get('/cats','CourseController@getCategories')->name('cats');
Route::get('/cat/{id}','CourseController@getCategory')->name('cat');

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/contact','CourseController@contact')->name('contact');
    Route::get('/about','CourseController@about')->name('about');

});
