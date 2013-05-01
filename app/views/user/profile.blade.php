@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

<?php

?>

{{Former::label(Lang::get('user.Name.').': '.$user->name)}}
{{Former::label(Lang::get('user.Surname.').': '.$user->surname)}}
{{Former::label(Lang::get('user.Email').': '.$user->email)}}
{{Former::label(Lang::get('user.Timezone').': '.$user->time_zone)}}
{{Former::label(Lang::get('user.language').': '.UserLibrary::language($user->language))}}
{{Button::link(URL::route('user.edit',Auth::user()->id), Lang::get('user.editProfile').); }}

@stop
