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
    {{ Former::open('providerSettings') }}
    {{ Former::text('Service name:')->autofocus() }}
    {{ Former::text('E-mail:') }}
    {{ Former::select('Language')->options($language) }}
    {{ Former::password('Change password:') }}
    {{ Former::password('Re-type password:') }}
    {{ Former::actions()->submit('Save settings') }}
    {{ Former::close() }}   
@stop