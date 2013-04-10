@extends('layouts.default')

@section('title')
    User profile
@stop

@section('content')
<?php
$name = 'Matic';
//$id = Auth::user()->email;
$email =  DB::table('users')
->where('name', $name)->first()->email;
//echo $email;
//echo $id;
//echo $user->id;
//echo Auth::user();

if (Auth::check())
{
     echo "You're logged in!";
	echo "<br /> <br/>";
}
else
{
	echo "You are NOT the father... I mean logged in!";
	echo "<br /> <br/>";
}
?>


{{Former::label('Name')}}
{{Former::label($name)}}
{{Former::label('Surname')}}
{{Former::label($name)}}
{{Former::label('Email')}}
{{Former::label($name)}}
{{Former::label('Timezone')}}
{{Former::label($name)}}
{{Former::label('Language')}}
{{Former::label($name)}}

@stop