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

<<<<<<< HEAD
Route::get('registerUserError', function()
{
	return View::make('registerUserError');
});

Route::resource('ureservation' , 'CustomerReservation');

=======
//TODO to user controller
>>>>>>> 03bc326e3711e3f4d278a05d271d5f79c390d7af
Route::get('registerUser',function()
{
	return View::make('registerUser');
});



Route::resource('ureservation' , 'CustomerReservation');
Route::resource('ManageServices','ManageServices');
Route::get('/service/{id}/time','ManageServices@timetable');
Route::get('/service/{id}/breaks','ManageServices@breaks');

<<<<<<< HEAD
Route::resource('riba','Riba');
Route::resource('user','UserController');

=======
//provider controller
Route::resource('provider','Provider');
Route::get('provider/confirm/{token}','Provider@getConfirm');
Route::post('provider/confirm/{token}','Provider@postConfirm');
>>>>>>> 03bc326e3711e3f4d278a05d271d5f79c390d7af
