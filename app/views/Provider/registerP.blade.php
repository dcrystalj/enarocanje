@extends('layouts.default')

@section('title')
    {{trans('general.providerRegistration')}}
@stop

@section('content')

	{{ Former::open('provider')->rules($rules)->id('provRegForm')}}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password',trans('general.password').': ') }}
    {{ Former::password('password_confirmation',trans('general.retypePassword').': ') }}
    {{ Former::hidden('code',Input::get('code')) }}
	{{ Former::actions()->button(trans('general.register'))->onclick("checkEmail(event,'#provRegForm')")}}
    {{ Former::close() }}
@stop