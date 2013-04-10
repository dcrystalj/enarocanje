@extends('layouts.default')

@section('title')
    Hello
@stop

@section('content')

    <p>Example</p>

    @if (isset($message))
	<p>{{ Alert::warning($message) }}</p>
	@endif

	@if (isset($success))
	<p>{{ Alert::warning('Email was sent') }}</p>
	@endif
	@if (Auth::check())
	<p> {{ Auth::user()->email }} U're logged in </p>
	@endif

@stop