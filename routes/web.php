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

Route::group(['middleware' => 'auth'], function(){
  Route::get('/','ResultController@index')->name('results.index');
  Route::get('/bmi/measure','BmiController@showMeasureForm')->name('bmi.measure');
  Route::post('/bmi/measure','BmiController@measure');
  Route::get('/pfc/measure','PfcController@showMeasureForm')->name('pfc.measure');
  Route::post('/pfc/measure','PfcController@measure');

  Route::group([
    'middleware' => 'can:view,bmi',  //ポリシーの設定
    'prefix' => 'bmi',   //URLの頭で共通に使用する部品
    'as' => 'bmi.',  //nameの頭で共通に使用する部品
  ], function(){
    Route::get('/{bmi}/result','BmiController@result')->name('result');
    Route::get('/{bmi}/delete','BmiController@delete')->name('delete');
  });

  Route::group([
    'middleware' => 'can:view,pfc',
    'prefix' => 'pfc',
    'as' => 'pfc.',
  ], function(){
    Route::get('/{pfc}/result','PfcController@result')->name('result');
    Route::get('/{pfc}/delete','PfcController@delete')->name('delete');
  });

  Route::group([
    'middleware' => 'can:view,user',
    'prefix' => 'user',
  ], function(){
    Route::get('/{user}/mypage','UserController@showMyPage')->name('mypage');
    Route::post('/{user}/mypage','UserController@update');
  });
});
Auth::routes();