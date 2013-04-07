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

//TODO to user controller
Route::get('registerUser',function()
{
	return View::make('registerUser');
});



Route::resource('ureservation' , 'CustomerReservation');
Route::resource('ManageServices','ManageServices');
Route::get('/service/{id}/time','ManageServices@timetable');
Route::get('/service/{id}/breaks','ManageServices@breaks');

//provider controller
Route::resource('provider','Provider');
Route::get('provider/confirm/{token}','Provider@getConfirm');
Route::post('provider/confirm/{token}','Provider@postConfirm');
