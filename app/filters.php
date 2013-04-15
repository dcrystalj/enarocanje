<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/
App::before(function($request)
{
	if (Session::has('user')) {
		Auth::login(Session::get('user'));
	}
	else{
		if(Cookie::has('user')){
			Session::put('user',Cookie::get('user'));
			Auth::login(Cookie::get('user'));
		}
	}
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. Also, a "guest" filter is
| responsible for performing the opposite. Both provide redirects.
|
*/

Route::filter('auth', function()
{
	 if(!Session::has('user')) return Redirect::route('home')->with('error','You have no permissions. Please login first');
	//if (Auth::guest()) return Redirect::route('home');
});

Route::filter('auth1', function()
{
	if (Auth::check() == FALSE ) return Redirect::route('find');
});


Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::getToken() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

