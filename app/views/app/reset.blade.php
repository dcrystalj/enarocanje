@extends('layouts.default')

@section('title')
Reset Password
@stop

@section('content')
	
	@if (Session::has('error'))
    
    	<p>{{ Alert::warning( trans(Session::get('reason'))) }}</p>
		
	@endif
 	
    {{ Former::open(URL::action('AppController@postResetpassword', $token)) }}
    {{ Former::hidden('token',$token) }}
    {{ Former::text('email',Lang::get('general.email').':')->autofocus() }}
    {{ Former::password('password',Lang::get('general.password').': ') }}
    {{ Former::password('password_confirmation',Lang::get('general.retypePassword').': ') }}
    {{ Former::actions()->submit(Lang::get('general.submit')) }}
    {{ Former::close() }}   

@stop
