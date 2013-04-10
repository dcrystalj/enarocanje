<?php

Route::get('/', function()
{
	return View::make('home');
});

Route::get('home', function()
{
	return View::make('home')->with('status',Session::get('status'));
});

Route::get('find', function()
{
	return View::make('find');
});

Route::get('login',function()
{	
	$rules = array(
		'email'    => 'required|email',
		'password' => 'required|between:4,20'
	);	
	return View::make('login')->with('rules',$rules);
});
Route::post('login',function()
{
	$rules = array(
		'email'    => 'required|email',
		'password' => 'required|between:4,20'
	);

	$input = Input::all();
	$input['confirmed'] = 1;

	if(Auth::attempt($input))
	{
		return Redirect::to('home');//->with('status','You have been sucessfully logged in.');  
	}
	else
	{
		return View::make('login')
			 	->with('error','Could not login, please try again')
			 	->with('rules',$rules);
	}
});

Route::get('logout',function()
{
	Auth::logout();
	return View::make('home')->with('status', 'Sucessfully logged out.');
});





Route::get('user/registerUser', function()
{
	return View::make('user/registerUser');
});




Route::resource('ureservation' , 'CustomerReservation');

Route::resource('ureservation' , 'CustomerReservation');
Route::resource('ManageServices','ManageServices');
Route::post('/service/{id}/time/submit','ManageServices@submit_time');
Route::post('/service/{id}/breaks/submit','ManageServices@submit_breaks');
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



