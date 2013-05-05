<?php
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






Route::resource('ManageServices','ManageServices');
Route::post('/service/{id}/time/submit', array('as' => 'timetable_submit', 'uses' => 'ManageServices@submit_time'));
Route::post('/service/{id}/breaks/submit',array('as' => 'breaks_submit', 'uses' => 'ManageServices@submit_breaks'));
Route::get('/service/{id}/time',array('as' => 'timetable', 'uses' => 'ManageServices@timetable'));
Route::get('/service/{id}/breaks', array( 'as' => 'breaks', 'uses' => 'ManageServices@breaks'));


//macroservice
Route::resource('macro','MacroserviceController');
Route::get('macro/{id}/activate',array(	'as' 	=> 'macroactivate', 
										'uses'	=> 'MacroserviceController@getActivated'));


//microservice extending macro
Route::resource('macro.micro','MicroserviceController');
Route::get('macro/{mac}/micro/{mic}/activate',array('as'=>'microactivate',
	'uses'=>'MicroserviceController@getActivated'));


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

//login logout ...
Route::controller('app','AppController');


// absence controller
Route::resource('macro.absence','AbsenceController');




 
//iron.io mail 
Route::post('queue/push', function(){
	return Queue::marshal();
});

//languages
Route::get('lang/{lang}', function($lang){
	Session::set('language',$lang);
	return Redirect::back();
});

// Google
Route::get('google/auth', array('as' => 'gauth', 'uses' => 'GCal@auth'));
Route::get('google/export', 'GCal@exportReservations');
Route::get('google/import/absences', 'GCal@importAbsences');
Route::get('google/import/holidays', 'GCal@importHolidays');
