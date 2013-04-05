@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')

	<p>{{ Typography::error( Session::get('status','') ) }}</p>
    

    {{ Former::open('provider/confirm/' . $uuid)->rules($rules) }}
    {{ Former::password('pass1','Password:') }}
    {{ Former::password('pass2','Re-type password:') }}
    {{ Former::actions()->submit('Submit') }}
    {{ Former::close() }}   

@stop