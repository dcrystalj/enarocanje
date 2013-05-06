@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')

    {{ Former::open('provider')->rules($rules) }}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password','Password:') }}
    {{ Former::password('password_confirmation','Retype password:') }}
    {{ Former::hidden('code',Input::get('code')) }}
    {{ Former::actions()->submit('Register') }}
    {{ Former::close() }}
@stop