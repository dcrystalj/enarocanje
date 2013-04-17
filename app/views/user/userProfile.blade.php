@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

<?php
/*
$id = Auth::user()->id;
$name = Auth::user()->name;
$surname = Auth::user()->surname;
$email = Auth::user()->mail;
$timezone = Auth::user()->time_zone;
$language = Auth::user()->language;

{{Former::label('Name')}}
{{Former::label($name)}}
{{Former::label('Surname')}}
{{Former::label($surname)}}
{{Former::label('Email')}}
{{Former::label($email)}}
{{Former::label('Timezone')}}
{{Former::label($timezone)}}
{{Former::label('Language')}}
{{Former::label($language)}}

*/


?>

{{Former::label('Name')}}
{{Former::label($user->name)}}
{{Former::label('Surname')}}
{{Former::label($user->surname)}}
{{Former::label('Email')}}
{{Former::label($user->email)}}
{{Former::label('Timezone')}}
{{Former::label($user->timezone)}}
{{Former::label('Language')}}
{{Former::label(Ulibrary::lang(0))}}

@stop
