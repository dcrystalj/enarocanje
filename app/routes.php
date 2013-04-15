<?php
Route::filter('provider',function()
{
	if (User::whereEmail(Auth::user()->email)->where('status','<',2)->first()) 
	{
		return Redirect::route('home')->with('error','You have no permissions.');
	}
});

Route::get('/', function()
{
	return View::make('home');
});

Route::get('home',array('as' => 'home', function()
{
		return View::make('home')
				->with('status',Session::get('status'))
				->with('error',Session::get('error'))
				->with('success',Session::get('success'));
}));

Route::get('find', function()
{
	return View::make('find');
});
Route::get('profile',array('before' => 'auth1',function()
{

	return View::make('app/login');
}));

Route::get('profile',array('after' => 'auth1',function()
{
	return View::make('user.userProfile')->before('auth');;
}));

Route::get('user/registerUser', function()
{
	return View::make('user/registerUser');
});



Route::resource('ManageServices','ManageServices');
Route::post('/service/{id}/time/submit','ManageServices@submit_time');
Route::post('/service/{id}/breaks/submit','ManageServices@submit_breaks');
Route::get('/service/{id}/time','ManageServices@timetable');
Route::get('/service/{id}/breaks','ManageServices@breaks');


//macroservice
Route::resource('macro','MacroserviceController');
Route::get('macro/{id}/activate',array(	'as' 	=> 'macroactivate', 
										'uses'	=> 'MacroserviceController@getActivated'));

//microservice extending macro
Route::resource('macro.micro','MicroserviceController');
Route::get('macro/{mac}/micro/{mic}/activate',array('as'=>'microactivate','uses'=>'MicroserviceController@getActivated'));

Route::resource('macro.micro.reservation' , 'CustomerReservation');

//provider
Route::resource('provider','Provider');
Route::get('provider/confirm/{token}','Provider@getConfirm');
Route::post('provider/confirm/{token}','Provider@postConfirm');

//user
Route::resource('user','UserController');
Route::get('user/confirm/{token}','UserController@getConfirm');
Route::post('user/confirm/{token}','UserController@postConfirm');

//calendar api
Route::controller('microserviceapi', 'MicroserviceApiController');

Route::controller('app','AppController');


