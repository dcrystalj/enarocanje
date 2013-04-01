@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')
    {{ Former::open('provider') }}
    {{ Former::text('Service Name:')->autofocus() }}
    {{ Former::text('Email:') }}
    {{ Former::actions()->submit('Register') }}
    {{ Former::close() }}   
@stop