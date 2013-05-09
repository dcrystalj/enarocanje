@extends('layouts.default')

@section('title')
    {{Lang::get('general.userSettings')}}
@stop

@section('content')

<?php

?>
{{Former::open(URL::route('user.update',Auth::user()->id))->rules($rules)->method('PUT')}}
{{Former::populate( Auth::user())}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::select('timezone',Lang::get('general.timezone'))->options(UserLibrary::timezones(),Auth::user()->time_zone)}}
{{Former::select('language',Lang::get('general.language'))->options(UserLibrary::languages())}}
{{Former::actions()->submit(Lang::get('general.submit'))}}
{{Former::close()}}

@stop
