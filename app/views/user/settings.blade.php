@extends('layouts.default')

@section('title')
    User settings
@stop

@section('content')

<?php

?>
{{Former::open(URL::route('user.update',Auth::user()->id))->rules($rules)->method('PUT')}}
{{Former::populate( array(	'name' => $user->name,
							'surname' => $user->surname,
							'timezone' => $user->time_zone,
							'language' => $user->language))}}
{{Former::text('name',Lang::get('user.Name'))->autofocus()}}
{{Former::text('surname',Lang::get('user.Surname'))}}
{{Former::select('timezone',Lang::get('user.Timezone'))->options(UserLibrary::timezones(),"UTC",true)}}
{{Former::select('language',Lang::get('user.Language'))->options(UserLibrary::languages())}}
{{Former::actions()->submit(Lang::get('user.Submit'))}}
{{Former::close()}}

@stop
