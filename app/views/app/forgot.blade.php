@extends('layouts.default')

@section('title')
{{trans('general.resetPassword')}}
@stop

@section('content')
	
	@if (Session::has('error'))
    
    	<p>{{ Alert::warning( trans(Session::get('reason'))) }}</p>
		
	@else
 	
		@if (Session::has('postforgot'))
			
			<p>{{ Alert::success(trans('messages.mailSuccessfullySent')) }}</p>
			<?php Session::forget('postforgot'); ?>
			
		@endif
	
	@endif

    {{ Former::open(URL::action('AppController@postForgot')) }}
    {{ Former::text('email',trans('general.email').':')
    			->autofocus()->value(empty($email) ? '' : $email) }}
    {{ Former::actions()->submit(trans('general.submit')) }}
    {{ Former::close() }}   
@stop