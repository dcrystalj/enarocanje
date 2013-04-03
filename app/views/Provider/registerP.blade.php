@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')
    {{ Former::open('provider') }}
    {{ Former::text('sname','Service Name:')->autofocus() }}
    {{ Former::text('email','Email:') }}
    {{ Former::actions()->submit('Register') }}
    {{ Former::close() }}   
@stop