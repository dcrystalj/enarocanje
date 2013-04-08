@extends('layouts.default')

@section('title')
    Login
@stop

@section('content')
    <?php 
            $userT[0]="User";
            $userT[1]="Provider";

    ?>  
    {{ Former::open()->rules($rules) }}
    {{ Former::text('name','Username:')->autofocus() }}
    {{ Former::text('email','Email:') }}
    {{ Former::text('password','Password:') }}
    {{ Former::select('userT','User type:')->options($userT,1)}}
    {{ Former::actions()->submit('Login') }}
    {{ Former::close() }}   
@stop