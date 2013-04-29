@extends('layouts.default')

@section('title')
    User registration
@stop

@section('content')
<?php

?>
{{Former::open('user')->rules($rules)}}
{{Former::text('name','Name')->autofocus()}}
{{Former::text('surname','Surname')}}
{{Former::text('email','Email')}}
{{Former::password('password','Password')}}
{{Former::password('repeat','Repeat password')}}
{{Former::select('timezone','Timezone')->options(UserLibrary::timezones(),"UTC",true)}}
{{Former::select('language','Language')->options(UserLibrary::languages())}}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop