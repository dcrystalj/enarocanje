@extends('layouts.default')

@section('title')
    Login
@stop

@section('content')
    <?php 
            $userT[0]="User";
            $userT[1]="Provider";
    ?>  

    <p>{{ Typography::error( Session::get('status','') ) }}</p>

    {{ Former::open() }}
    {{ Former::text('email','Email:')->autofocus() }}
    {{ Former::password('password','Password:') }}
    {{ Former::checkbox('Remember') }}
    {{ Former::actions()->submit('Login') }}
    {{ Former::close() }}   
@stop