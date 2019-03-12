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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/venue/type/{id}', 'VenueController@list');
Route::get('/venue/detail/{id}', 'VenueController@detail');

Route::get('/venue/create', 'VenueController@create');
Route::post('/venue/save', 'VenueController@save');
Route::get('/venue/show', 'VenueController@show');

Route::get('/venue/edit/{id}', 'VenueController@edit');

Route::post('/venue/update/{id}', 'VenueController@update');


Route::get('/venue/del/{id}', 'VenueController@del');
Route::get('/photo/set', 'UserController@set');
Route::post('/photo/bao', 'UserController@bao');









