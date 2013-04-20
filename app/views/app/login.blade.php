@extends('layouts.default')

@section('title')
    Login
@stop

@section('content')

    {{ Former::open() }}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password','Password:') }}
    {{ Former::actions()->submit('Login') }}
    {{ Former::close() }}   
@stop