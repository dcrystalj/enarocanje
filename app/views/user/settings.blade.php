@extends('layouts.default')

@section('title')
    User settings
@stop

@section('content')

<?php
    for ($i=-11;$i<=12;$i++) {
        if($i<0) $timezone[$i] = $i;
        else if($i>0) $timezone[$i] = "+".$i;
        else $timezone[$i] =  "UTC";
    }
    $language = array("English","Slovenian", "Italian","German");

?>
{{Former::open('userSettings')->rules($rules)}}
{{Former::populate( array(	'name' => $user->name,
							'surname' => $user->surname,
							'timezone' => $user->time_zone,
							'language' => $user->language))}}
{{Former::text('name','Name')->autofocus()}}
{{Former::text('surname','Surname')}}
{{Former::select('timezone','Timezone')->options($timezone,"UTC",true)}}
{{Former::select('language','Language')->options($language)}}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop
