<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/','Controller@');
Route::get('/','HomeController@index');
Route::get('/index','ResultController@index')->name('results.index');
Route::get('/bmi/measure','BmiController@showMeasureForm')->name('bmi.measure');
Route::post('/bmi/measure','BmiController@measure');
Route::get('/bmi/{bmi}/result','BmiController@result')->name('bmi.result');
Route::get('/pfc/measure','PfcController@showMeasureForm')->name('pfc.measure');
Route::post('/pfc/measure','PfcController@measure');
Route::get('/pfc/{pfc}/result','PfcController@result')->name('pfc.result');


Route::get('/users/{user}','Controller@');
Route::get('/users/{user}/edit','Controller@');
Route::post('/users/{user}/edit','Controller@');

Auth::routes();