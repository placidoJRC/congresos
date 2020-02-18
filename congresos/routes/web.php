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



Auth::routes();

Route::get('/home', 'IndexController@index');
Route::get('/', 'IndexController@index');
Route::get('/ponencia', 'ponencia@index');
Route::get('/ponencia/create', 'ponencia@create');
Route::post('/pago/store', 'pago@store');
Route::get('/pagar', 'pago@index');
Route::get('/ponencia/show/{id}', 'ponencia@show')->name('verponencia');
Route::resource('userponencia', "userponencia");
Route::get('/usuarios', 'IndexController@usuarios');
Route::resource('User', "UserCustomController");
Route::post('/ponencia/create', 'ponencia@store');
Route::get('/congreso', 'IndexController@congresos');
Route::get('/pago', 'IndexController@pago');
Route::post('/pago/{id}', 'IndexController@update');
Auth::routes(['verify' => true]);