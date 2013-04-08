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
    $rules = array(
      'Name'     => 'required|max:20|alpha',
      'Surname'  => 'required|max:20|alpha',
      'Email'    => 'required|email',
      'password' => 'required|min:6',
      'repeat' => 'required|min:6',
      'Timezone' => 'min:1',
      'Language' => 'min:1',
    );
?>
{{Former::open("user/UserController")->rules($rules)}}
{{Former::text('Name')->class('myclass')->autofocus()}}
{{Former::text('Surname')->class('myclass')}}
{{Former::text('Email')}}
{{Former::password('password','Password')}}
{{Former::password('repeat','Repeat password')}}
{{Former::select('Timezone')->options($timezone,"UTC",true)}}
{{Former::select('Language')->options($language)}}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop