@extends('layouts.default')

@section('title')
    {{Lang::get('provider.registration')}}
@stop

@section('content')

    {{ Former::open()->rules($rules) }}
    {{ Former::hidden('token',$token) }}
    {{ Former::password('password',Lang::get('provider.password'':') }}
    {{ Former::password('password_confirmation',Lang::get('provider.retypeP4password'.) }}
    {{ Former::actions()->submit(Lang::get('provider.submit')) }}
    {{ Former::close() }}   

@stop