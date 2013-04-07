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
/* only few examples */
Route::get('/', function()
{
	return View::make('home');
});

Route::get('home', function()
{
	return View::make('home');
});

Route::get('find', function()
{
	return View::make('find');
});

Route::get('registerUserError', function()
{
	return View::make('registerUserError');
});

Route::resource('ureservation' , 'CustomerReservation');

Route::get('registerUser',function()
{
	return View::make('registerUser');
});

Route::resource('provider','Provider');
Route::resource('ManageServices','ManageServices');

Route::resource('riba','Riba');
Route::resource('user','UserController');

