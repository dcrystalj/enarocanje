@extends('layouts.default')

@section('title')
    {{trans('general.userSettings')}}
@stop

@section('content')

<?php

?>
{{Former::open(URL::route('user.update',Auth::user()->id))->rules($rules)->method('PUT')}}
{{Former::populate( Auth::user())}}
{{Former::text('name',trans('general.name'))->autofocus()}}
{{Former::text('surname',trans('general.surname'))}}
{{Former::select('timezone',trans('general.timezone'))->options(UserLibrary::timezones(),Auth::user()->time_zone)}}
{{Former::select('language',trans('general.language'))->options(UserLibrary::languages())}}
{{Former::actions()->submit(trans('general.submit'))}}
{{Former::close()}}

@stop
