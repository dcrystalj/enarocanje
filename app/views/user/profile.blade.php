@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

<?php

?>

{{Former::label(Lang::get('user.name').': '.$user->name)}}
{{Former::label(Lang::get('user.surname').': '.$user->surname)}}
{{Former::label(Lang::get('user.email').': '.$user->email)}}
{{Former::label(Lang::get('user.timezone').': '.$user->time_zone)}}
{{Former::label(Lang::get('user.language').': '.UserLibrary::language($user->language))}}
{{Button::link(URL::route('user.edit',Auth::user()->id), Lang::get('user.editProfile').); }}

@stop
