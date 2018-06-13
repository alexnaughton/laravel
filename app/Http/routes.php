<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//Login
Route::get('/', 'LoginController@index');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

//Home
Route::get('home', 'HomeController@index');
Route::get('my_predictions', 'HomeController@my_predictions');
Route::post('update_predictions', 'HomeController@update_predictions');
Route::get('user_predictions/{user_id}', 'HomeController@user_predictions');

//Admin
Route::get('yz9slf', 'AdminController@add_user');
Route::post('save_user', 'AdminController@save_user');
Route::get('yz9slf2', 'AdminController@games');
Route::get('enter_result/{game_id}', 'AdminController@enter_result');
Route::post('submit_result/{game_id}', 'AdminController@submit_result');
