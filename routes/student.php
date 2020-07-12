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
Route::group(['namespace'=>'students','prefix'=>'student','middleware'=>['studentRedirect','instructorRedirect']], function () {
    //student
  Route::get('/login','StudentController@log')->name('student.log');
  Route::post('/login','StudentController@doLog')->name('student.doLog');
  Route::get('/register','StudentController@register')->name('student.register');
  Route::post('/register','StudentController@doRegister')->name('student.doRegister');
});
Route::group(['namespace'=>'students','prefix'=>'student','middleware'=>'studentAuth'], function () {
    //student
  Route::get('/logout','StudentController@logout')->name('student.logout');

});
