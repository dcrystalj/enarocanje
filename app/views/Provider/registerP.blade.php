@extends('layouts.default')

@section('title')
    {{Lang::get('general.providerRegistration')}}
@stop

@section('content')

	{{ Former::open('provider')->rules($rules)->id('provRegForm')}}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password',Lang::get('general.password').': ') }}
    {{ Former::password('password_confirmation',Lang::get('general.retypePassword').': ') }}
    {{ Former::hidden('code',Input::get('code')) }}
	{{ Former::actions()->button(Lang::get('general.register'))->onclick("checkEmail(event,'#provRegForm')")}}
    {{ Former::close() }}
@stop