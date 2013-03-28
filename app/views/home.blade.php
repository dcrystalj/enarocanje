@extends('layouts.default')

@section('title')
    Hello
@stop

@section('content')
    <p>Example</p>

    <h3>primer forme</h3>
    {{ Former::open() }}
	{{ Former::text('name')->autofocus() }}
	{{ Former::text('surname') }}
	{{ Former::password('password') }}
	{{ Former::actions()->submit('Submit') }}
	{{ Former::close() }}	
@stop