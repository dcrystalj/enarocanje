@extends('layouts.default')

@section('title')
    Service settings
@stop

@section('content')
<?php
    $language[0] = "English";
    $language[1] = "Slovenian";
    $language[2] = "Italian";
    $language[3] = "German";
?>
    {{ Former::open('provider/' . $user->id)->rules($rules)->method('PUT') }}
    {{ Former::populate($user) }}
    {{ Former::text('name','Service name:')->autofocus() }}
    {{ Former::select('language','Language')->options($language) }}
    {{ Former::password('password','Change password:') }}
    {{ Former::password('password_confirmation','Re-type password:') }}
    {{ Former::actions()->submit('Save settings') }}
    {{ Former::close() }}   
@stop