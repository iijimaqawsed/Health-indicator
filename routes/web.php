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
Route::group(['middleware' => 'auth'], function(){
  Route::get('/','ResultController@index')->name('results.index');
  Route::get('/bmi/measure','BmiController@showMeasureForm')->name('bmi.measure');
  Route::post('/bmi/measure','BmiController@measure');
  Route::get('/pfc/measure','PfcController@showMeasureForm')->name('pfc.measure');
  Route::post('/pfc/measure','PfcController@measure');
  Route::group(['middleware' => 'can:view,bmi'], function(){
    Route::get('/bmi/{bmi}/result','BmiController@result')->name('bmi.result');
    Route::get('/bmi/{bmi}/delete','BmiController@delete')->name('bmi.delete');
  });
  Route::group(['middleware' => 'can:view,pfc'], function(){
    Route::get('/pfc/{pfc}/result','PfcController@result')->name('pfc.result');
    Route::get('/pfc/{pfc}/delete','PfcController@delete')->name('pfc.delete');
});
  Route::get('/user/{user}/mypage','UserController@showMyPage')->name('mypage');
  Route::get('/users/{user}/edit','Controller@');
  Route::post('/users/{user}/edit','Controller@');
});
Auth::routes();