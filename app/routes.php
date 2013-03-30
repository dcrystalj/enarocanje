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

Route::get('user', function()
{
	return View::make('userWithFormer');
});

Route::get('userWithFormer', function()
{
	return View::make('userWithFormer');
});



Route::resource('ureservation' , 'CustomerReservation');

Route::get('/',function()
{
	return View::make('registerP');
});

Route::get('registerP',function()
{
	return View::make('registerP');
});

Route::controller('providerRegistrationH','ProviderRegistrationHandler');
Route::controller('providerRegistrationV','ProviderRegistrationVal');

Route::get('/',function()
{
	return View::make('ProviderServiceSettings');
});

Route::get('ProviderServiceSettings',function()
{
	return View::make('ProviderServiceSettings');
});

Route::get('/',function()
{
	return View::make('ManageServices');
});

Route::get('ManageServices',function()
{
	return View::make('ManageServices');
});

// application/routes.php
#route::controller('UserRegValidationController');

#Route::controller('account');
