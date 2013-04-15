@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

{{ Former::open() }}
{{ Former::populate($user) }}
{{ Former::label('email')}}
{{ Former::close() }}
@stop