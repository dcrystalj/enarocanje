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
{{Former::text('name','Name')->autofocus()}}
{{Former::text('surname','Surname')}}
{{Former::select('timezone','Timezone')->options(.UserLibrary::timezone,"UTC",true)}}
{{Former::select('language','Language')->options(.UserLibrary::language)}}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop
