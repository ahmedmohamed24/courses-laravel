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

//logging
Route::group(['prefix' => 'admin','middleware'=>'adminRedirect','namespace'=>'admin'], function () {
    Route::get('/login','AdminLogController@adminLogin')->name('admin.log');
    Route::post('/login','AdminLogController@AdminDoLog')->name('admin.doLog');
});




Route::group(['prefix' => 'admin','middleware'=>'adminAuth','namespace'=>'admin'], function () {



    Route::get('/','AdminController@index')->name('admin.index');
    
    Route::get('/logout','AdminLogController@logout')->name('admin.logout');

    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/','AdminCategoryController@getCats')->name('admin.cats');
        Route::get('/create','AdminCategoryController@createCat')->name('admin.createCategory');
        Route::post('/create','AdminCategoryController@saveCat') ->name('admin.saveCategory');
        Route::get('/edit/{id}','AdminCategoryController@catEdit')->where(['id'=>'[0-9]+'])->name('admin.catEdit');
        Route::post('/update','AdminCategoryController@catUpdate')->name('admin.catUpdate');
        Route::get('/delete/{id}','AdminCategoryController@catDelete')->where(['id'=>'[0-9]+'])->name('admin.catDelete');
    });

    //admin settings
    Route::get('/settings','AdminController@settings')->name('admin.settings');
    Route::get('/add','AdminController@add')->name('admin.add');
    Route::post('/add','AdminController@save')->name('admin.save');
    Route::post('/change','AdminController@change')->name('admin.change');//change password
});
