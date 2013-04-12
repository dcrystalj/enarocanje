@extends('layouts.default')

@section('title')
    Home
@stop

@section('content')

	@if (Auth::check())
	<p> Welcome {{ Auth::user()->email }} </p>
	@else
	<p> You are not logged in </p>
	@endif

@stop