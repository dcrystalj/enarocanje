<?php

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

Route::get('user/registerUser', function()
{
	return View::make('user/registerUser');
});

Route::resource('ureservation' , 'CustomerReservation');

Route::resource('ureservation' , 'CustomerReservation');
Route::resource('ManageServices','ManageServices');
Route::post('/service/{id}/time/submit','ManageServices@submit_time');
Route::get('/service/{id}/time','ManageServices@timetable');
Route::get('/service/{id}/breaks','ManageServices@breaks');

Route::resource('user','UserController');

Route::resource('provider','Provider');
Route::get('provider/confirm/{token}','Provider@getConfirm');
Route::post('provider/confirm/{token}','Provider@postConfirm');

Route::resource('user','UserController');
Route::get('user/confirm/{token}','user@getConfirm');
Route::post('user/confirm/{token}','user@postConfirm');


Route::controller('microserviceapi', 'MicroserviceApiController');

//login controller
Route::get('/UserLogin',function()
{
	return View::make('UserLogin');
});
Route::post('UserLogin',function()
{
	$email = Input::get('email');
	$password = Input::get('password');
	$remember = Input::get('Remember');
	if(Auth::attempt(array('username' => $email, 'password' => $password)))
	{
		return Redirect::to('UserLogin')->with('status','User sucessfully loged in.');  
	}
});
/*Route::post('Logout',function()
{
	Auth::logout();
	return Redirect::to('UserLogin');
});*/


