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
    $language[0] = "English";
    $language[1] = "Slovenian";
    $language[2] = "Italian";
    $language[3] = "German";
    $rules = array(
      'Name'     => 'required|max:20|alpha',
      'Surname'  => 'required|max:20|alpha',
      'Email'    => 'email',
      'Password' => 'size:5',
      'Password2' => 'size:5',
      'Timezone' => 'min:1',
      'Language' => 'min:1',
    );
?>
{{Former::open("riba")->rules($rules)}}
{{Former::text('Name')->class('myclass')->autofocus()}}
{{Former::text('Surname')->class('myclass')}}
{{Former::text('Email')}}
{{Former::password('Password')}}
{{Former::password('Password2')}}
{{Former::select('Timezone')->options($timezone,"UTC",true)}}
{{Former::select('Language')->options($language)}}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop