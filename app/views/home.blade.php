@extends('layouts.default')

@section('title')
    Hello
@stop

@section('content')

    <p>Example</p>

    @if (isset($message))
	<p>{{ Typography::warning($message) }}</p>
	@endif
	
	<p>{{ Typography::error( Session::get('status','') ) }}</p>
	
	@if (isset($success))
	<p>{{ Typography::warning('Email was sent') }}</p>
	@endif

@stop