<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('book', 'BookController@index');
Route::get('settings', 'SettingsController@index');
Route::get('settings/changepassword', 'SettingsController@changepassword');
Route::get('book/create', 'BookController@create');
Route::get('book/edit/{id}', 'BookController@edit');
Route::get('book/destroy/{id}', 'BookController@destroy');
Route::post('book/store', 'BookController@store');
Route::post('settings/update', 'SettingsController@update');
Route::post('settings/change', 'SettingsController@change');
Route::post('book/update', 'BookController@update');
Route::get('book/show/{id}', 'BookController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
