@extends('layouts.default')

@section('title')
    Hello
@stop

@section('content')

    <p>Example</p>

    @if (isset($message))
	<p>{{ Typography::warning($message) }}</p>
	@endif

@stop