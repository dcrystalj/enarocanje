@extends('layouts.default')

@section('title')
	{{Lang::get('general.home')}}
@stop

@section('content')

	@if (Auth::check())
	<p>{{Lang::get('general.welcome'); Auth::user()->name }} </p>
	@else
	<p>{{Lang::get('messages.notLoggedIn')}}</p>
	@endif

@stop