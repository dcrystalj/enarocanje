@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')
<?php

if (Auth::check())
{
     echo "You're logged in!";
	echo "<br /> <br/>";
}
else
{
	echo "You are NOT the father... I mean logged in!";
	echo "<br /> <br/>";
}
?>
{{ Former::open() }}
{{ Former::populate($user) }}
{{ Former::label('email')}}
{{ Former::close() }}
@stop