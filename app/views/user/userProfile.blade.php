@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

<?php
$id = Auth::user()->id;
$name = Auth::user()->name;
$surname = Auth::user()->surname;
$email = Auth::user()->mail;
$timezone = Auth::user()->time_zone;
$language = Auth::user()->language;


?>


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

@stop