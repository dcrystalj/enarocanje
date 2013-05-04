@extends('layouts.default')

@section('title')
    Login
@stop

@section('content')

    {{ Former::open() }}
    {{ Former::text('email','Email:')->autofocus()->value(empty($email) ? '' : $email) }}
    {{ Former::password('password','Password:')->id('Password') }}
    {{ Former::actions()->submit('Login') }}
    {{ Former::close() }}   
@stop