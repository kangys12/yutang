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


Route::get('/venue/follow/{id}', 'VenueController@follow');
Route::get('/venue/unfollow/{id}', 'VenueController@unfollow');


Route::get('/venue/my_follows', 'VenueController@my_follows');

Route::get('/price/set/{id}', 'PriceController@set');
Route::post('/price/save', 'PriceController@save');

Route::post('/order/save', 'OrderController@save');


Route::get('/m', function (){
    return view('/m/master');
});

Route::get('/venue/my_list','m\VenueController@my_list');
Route::get('/venue/types', 'm\VenueController@type');

Route::get('/venue/get_type/{id}', 'm\VenueController@get_type');

Route::get('/m/venue/detail/{id}', 'm\VenueController@detail');

Route::post('/m/user/save', 'm\UserController@save');





















