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
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('generate-event', 'HomeController@generatePublicEvent');


Route::get('activity','ActivityController@index');
Route::post('record-activity','ActivityController@recordActivity');

Route::get('route','RouteController@index');
Route::post('record-activity','RouteController@recordRouteCoords');
