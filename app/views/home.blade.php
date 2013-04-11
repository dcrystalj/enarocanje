@extends('layouts.default')

@section('title')
    Home
@stop

@section('content')

    @if (isset($message))
	<p>{{ Alert::warning($message) }}</p>
	@endif

	@if (isset($success))
	<p>{{ Alert::warning('Email was sent') }}</p>
	@endif
	
	@if (Auth::check())
	<p> {{ Auth::user()->email }} You are logged in </p>
	@else
	<p> You are not logged in </p>
	@endif

@stop