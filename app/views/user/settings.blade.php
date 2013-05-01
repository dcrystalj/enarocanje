@extends('layouts.default')

@section('title')
    {{Lang::get('user.userSettings')}}
@stop

@section('content')

<?php

?>
{{Former::open(URL::route('user.update',Auth::user()->id))->rules($rules)->method('PUT')}}
{{Former::populate( array(	'name' => $user->name,
							'surname' => $user->surname,
							'timezone' => $user->time_zone,
							'language' => $user->language))}}
{{Former::text('name',Lang::get('user.name'))->autofocus()}}
{{Former::text('surname',Lang::get('user.surname'))}}
{{Former::select('timezone',Lang::get('user.timezone'))->options(UserLibrary::timezones(),"UTC",true)}}
{{Former::select('language',Lang::get('user.language'))->options(UserLibrary::languages())}}
{{Former::actions()->submit(Lang::get('user.submit'))}}
{{Former::close()}}

@stop
