@extends('layouts.default')

@section('title')
    {{Lang::get('general.userSettings')}}
@stop

@section('content')

<?php

?>
{{Former::open(URL::route('user.update',Auth::user()->id))->rules($rules)->method('PUT')}}
{{Former::populate( array(	'name' => $user->name,
							'surname' => $user->surname,
							'timezone' => $user->time_zone,
							'language' => $user->language))}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::select('timezone',Lang::get('general.timezone'))->options(UserLibrary::timezones(),"UTC",true)}}
{{Former::select('language',Lang::get('general.language'))->options(UserLibrary::languages())}}
{{Former::actions()->submit(Lang::get('general.submit'))}}
{{Former::close()}}

@stop
