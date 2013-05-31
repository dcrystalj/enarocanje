@extends('layouts.default')

@section('title')
	{{trans('general.home')}}
@stop

@section('content')

	@if (Auth::check())
	<p>{{trans('general.welcome'); Auth::user()->name }} </p>
	@else
	<p>{{trans('messages.notLoggedIn')}}</p>
	@endif

@stop