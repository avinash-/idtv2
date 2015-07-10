<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/welcome/admin','HomeController@dashboard');
Route::get('/manager/{id}','HomeController@manager');
Route::get('/manager/details/{id}','ManagerController@getDetails');
Route::get('/account/details/{id}','ManagerController@accDetails');
Route::get('/tools/details/{id}','ManagerController@toolDetails');
Route::get('/reports','ReportController@index');

Route::resource('/employees','EmployeeController');
Route::resource('/accounts','AccountsController');
Route::resource('/user', 'UserController');
Route::resource('/managers', 'ManagerController');
Route::controller('/', 'HomeController');


// Route::get('/', function()
// {
// 	return View::make('hello');
// });
