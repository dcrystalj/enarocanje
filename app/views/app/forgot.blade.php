@extends('layouts.default')

@section('title')
Reset Password
@stop

@section('content')
	
	@if (Session::has('error'))
    
    	<p>{{ Alert::warning( trans(Session::get('reason'))) }}</p>
		
	@else
 	
		@if (Session::has('postforgot'))
			
			<p>{{ Alert::success('Mail was successfully sent') }}</p>
			<?php Session::forget('postforgot'); ?>
			
		@endif
	
	@endif

    {{ Former::open(URL::action('AppController@postForgot')) }}
    {{ Former::text('email',Lang::get('general.email').':')
    			->autofocus()->value(empty($email) ? '' : $email) }}
    {{ Former::actions()->submit(Lang::get('general.submit')) }}
    {{ Former::close() }}   
@stop