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

Route::resource('ureservation' , 'CustomerReservation');

Route::get('registerP',function()
{
	return View::make('registerP');
});

Route::get('registerUser',function()
{
	return View::make('registerUser');
});

Route::controller('providerRegistrationH','ProviderRegistrationHandler');
Route::controller('providerRegistrationV','ProviderRegistrationVal');
#Route::controller('UserRegistrationH','UserRegistrationH');
#Route::controller('UserRegistrationV','UserRegistrationV');


Route::get('ProviderServiceSettings',function()
{
	return View::make('ProviderServiceSettings');
});	

Route::get('ManageServices',function()
{
	return View::make('ManageServices');
});

#Route::controller('account');
#Route::controller('UserregistrationsController','UserregistrationsController');
#Route::controller('UserregistrationsController');
