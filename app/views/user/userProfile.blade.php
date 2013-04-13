@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')

<?php
$id = Auth::user()->id;
$name = DB::table('users')->where('id', $id)->first()->name;
$surname = DB::table('users')->where('id', $id)->first()->surname;
$email = DB::table('users')->where('id', $id)->first()->email;
$timezone = DB::table('users')->where('id', $id)->first()->time_zone;
$language = DB::table('users')->where('id', $id)->first()->language;


//$user = DB::table('users')
//->where('id', $id);
//$user = DB::query('select * from users where id = 75');
//$email =  DB::table('users')
//->where('id', $id)->first()->email;
//echo $email;
//echo $id;
//echo $user->id;
//echo Auth::user();


//$name="asd";
//$surname="asd";
//$email="asd";
//$timezone="asd";
//$language="asd";
//$name = $user->name;
?>


{{Former::label('Name')}}
{{Former::label($name)}}
{{Former::label('Surname')}}
{{Former::label($surname)}}
{{Former::label('Email')}}
{{Former::label($email)}}
{{Former::label('Timezone')}}
{{Former::label($timezone)}}
{{Former::label('Language')}}
{{Former::label($language)}}

@stop