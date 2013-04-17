@extends('layouts.default')

@section('title')
    Provider settings
@stop

@section('content')
<?php
    $language[0] = "English";
    $language[1] = "Slovenian";
    $language[2] = "Italian";
    $language[3] = "German";
?>

    @if (isset($message))
        <p>{{ Alert::warning($message) }}</p>
    @endif
    
    <?php $user = Auth::user() ?>

    {{ Former::open(URL::route('provider.update', $user->id))
                ->rules($rules)
                ->method('PUT') }}
    {{ Former::populate($user) }}
    {{ Former::text('name','Name:')->autofocus() }}
    {{ Former::text('surname','Last name:') }}
    {{ Former::select('language','Language')->options($language) }}
    {{ Former::password('password','Change password:') }}
    {{ Former::password('password_confirmation','Re-type password:') }}
    {{ Former::actions()->submit('Save settings') }}
    {{ Former::close() }}   
@stop