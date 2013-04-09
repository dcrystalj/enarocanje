@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')

    {{ Former::open()->rules($rules) }}
    {{ Former::hidden('token',$token) }}
    {{ Former::password('password','Password:') }}
    {{ Former::password('password_confirmation','Re-type password:') }}
    {{ Former::actions()->submit('Submit') }}
    {{ Former::close() }}   

@stop