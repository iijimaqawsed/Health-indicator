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
Route::get('/bmis/{bmi}/pfcs/{pfc}/index','ResultController@index')->name('results.index');
Route::get('/bmis/{bmi}/measure','Controller@');
Route::post('/bmis/{bmi}/measure','Controller@');
Route::get('/pfcs/{pfc}/measure','Controller@');
Route::post('/pfcs/{pfc}/measure','Controller@');
Route::get('/users/{user}','Controller@');
Route::get('/users/{user}/edit','Controller@');
Route::post('/users/{user}/edit','Controller@');

Auth::routes();