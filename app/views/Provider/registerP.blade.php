@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')

    {{ Former::open('provider')->rules($rules) }}
    {{ Former::text('name','Service Name:')->autofocus() }}
    {{ Former::text('email','Email:') }}
    {{ Former::actions()->submit('Register') }}
    {{ Former::close() }}   
@stop