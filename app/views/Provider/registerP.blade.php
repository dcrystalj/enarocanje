@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')

	@if(Session::get('status'))
	<p>{{ Typography::error( Session::get('status') ) }}</p>
	@endif

    {{ Former::open('provider')->rules($rules) }}
    {{ Former::text('sname','Service Name:')->autofocus() }}
    {{ Former::text('email','Email:') }}
    {{ Former::actions()->submit('Register') }}
    {{ Former::close() }}   
@stop