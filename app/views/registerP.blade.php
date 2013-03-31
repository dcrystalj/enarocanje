@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')
<?php 
	$rules = array('Service Name:'     => 'required|max:20|alpha',
                   'Email:'    => 'required',);
?>
    {{ Former::open()->rules($rules) }}
    {{ Former::text('Service Name:')->autofocus() }}
    {{ Former::text('Email:') }}
    {{ Former::actions()->submit('Register') }}
    {{ Former::close() }}   
@stop