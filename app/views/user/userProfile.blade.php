@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

<?php



?>

{{Former::label('Name: '.$user->name)}}
{{Former::label('Surname: '.$user->surname)}}
{{Former::label('Email: '.$user->email)}}
{{Former::label('Timezone: '.$user->timezone)}}
{{Former::label('Language: '.UserLibrary::lang($user->language))}}

@stop
