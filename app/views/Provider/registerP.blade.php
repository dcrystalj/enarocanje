@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')

    {{ Former::open('provider')->rules($rules) }}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password',Lang::get('provider.password'.': ')) }}
    {{ Former::password('password_confirmation','provider.retypePassword'.': ') }}
    {{ Former::actions()->submit(Lang::get('provider.register')) }}
    {{ Former::close() }}
@stop