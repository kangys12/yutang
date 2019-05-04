<?php
/**
 * Created by PhpStorm.
 * User: hxsd
 * Date: 2019/3/28
 * Time: 10:44
 */
Route::get('/m', function (){
    return view('/m/master');
});

Route::get('/venue/my_list','m\VenueController@my_list');
Route::get('/venue/types', 'm\VenueController@type');

Route::get('/venue/get_type/{id}', 'm\VenueController@get_type');

Route::get('/m/venue/detail/{id}', 'm\VenueController@detail');

Route::post('/m/user/save', 'm\UserController@save');


Route::post('/m/user/upload', 'm\UserController@upload');

Route::post('/m/user/login', 'm\UserController@login');

Route::get('/m/user/info', 'm\UserController@info');

Route::post('/m/venue/search', 'm\VenueController@search');

Route::get('/m/order/times/{id}', 'm\OrderController@times');

Route::post('/m/order/save', 'm\OrderController@save');

Route::get('/m/user/my_orders', 'm\UserController@my_orders');

Route::get('/m/order/detail/{id}', 'm\OrderController@detail');

Route::get('/m/order/types', 'm\OrderController@types');

Route::post('/m/game/save', 'm\GameController@save');

Route::get('/m/game/dates', 'm\GameController@dates');

Route::get('/m/game/join/{id}', 'm\GameController@join');

Route::get('/m/game/my_create_games', 'm\GameController@my_create_games');



