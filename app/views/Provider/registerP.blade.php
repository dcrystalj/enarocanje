@extends('layouts.default')

@section('title')
    {{Lang::get('general.providerRegistration')}}
@stop

@section('content')

    {{ Former::open('provider')->rules($rules) }}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password',Lang::get('general.password').': ') }}
    {{ Former::password('password_confirmation',Lang::get('general.retypePassword').': ') }}
    {{ Former::hidden('code',Input::get('code')) }}
    {{ Former::actions()->submit(Lang::get('general.register')) }}

    {{ Former::close() }}
@stop