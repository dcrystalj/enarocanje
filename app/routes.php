<?php
Route::filter('provider',function()
{
	if (!Auth::user()->isProvider()) 
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
Route::get('profile', function()
{
	return View::make('user.userProfile')->with('user',Auth::user());
})->before('auth');

Route::get('user/registerUser', function()
{
	return View::make('user/registerUser');
});



Route::resource('ManageServices','ManageServices');
Route::post('/service/{id}/time/submit', array('as' => 'timetable_submit', 'uses' => 'ManageServices@submit_time'));
Route::post('/service/{id}/breaks/submit',array('as' => 'breaks_submit', 'uses' => 'ManageServices@submit_breaks'));
Route::get('/service/{id}/time','ManageServices@timetable');
Route::get('/service/{id}/breaks', array( 'as' => 'breaks', 'uses' => 'ManageServices@breaks'));


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
Route::post('/microserviceapi/workinghours/{id}', array('as' => 'api_mic_whours', 'uses' => 'ManageServiceApiController@getWorkinghours'));
Route::get('/microserviceapi/breaks/{id}', array('as' => 'api_mic_breaks', 'uses' => 'ManageServiceApiController@getBreaks'));
Route::get('/microserviceapi/timetable/{id}', array('as' => 'api_mic_timetable', 'uses' => 'ManageServiceApiController@getTimetable'));
Route::get('/microserviceapi/usertimetable/{id}', array('before'=>'auth', 'as' => 'api_mic_utimetable', 'uses' => 'ManageServiceApiController@getUsertimetable'));
Route::post('/microserviceapi/reservation/{id}', array('as' => 'api_mic_reservation', 'uses' => 'ManageServiceApiController@postReservation'));
Route::post('/microserviceapi/deletereservation/{id}', array('as' => 'api_mic_rm_reservation', 'uses' => 'ManageServiceApiController@postDeleteReservation'));
Route::post('/microserviceapi/registration/{id}', array('as' => 'api_mic_registration', 'uses' => 'ManageServiceApiController@postRegistration'));

Route::controller('app','AppController');


