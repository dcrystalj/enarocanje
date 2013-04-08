@extends('layouts.default')

@section('title')
    User registration
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
{{Former::open('user')->rules($rules)}}
{{Former::text('Name')->autofocus()}}
{{Former::text('Surname')}}
{{Former::text('Email')}}
{{Former::password('password','Password')}}
{{Former::password('repeat','Repeat password')}}
{{Former::select('Timezone')->options($timezone,"UTC",true)}}
{{Former::select('Language')->options($language)}}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop