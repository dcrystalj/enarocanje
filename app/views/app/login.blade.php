@extends('layouts.default')

@section('title')
    {{Lang::get('general.login')}}
@stop

@section('content')

    {{ Former::open('app/login') }}
    {{ Former::text('email',Lang::get('general.email').':')->autofocus()->value(empty($email) ? '' : $email) }}
    {{ Former::password('password',Lang::get('general.password').':')->id('Password') }}
    {{ Former::actions()->submit(Lang::get('general.login')) }}
    {{ Former::close() }}   
@stop