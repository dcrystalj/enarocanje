@extends('layouts.default')

@section('title')
    Refer a friend
@stop

@section('content')

    {{ Former::open(URL::route('referral.store'))->rules($rules) }}
    {{ Former::text('to','To:')}}
    {{ Former::text('content','Subject:') }}
       Referral link: {{ Typography::info($link) }}
    {{ Former::actions()->submit('Send referral' ) }}
    {{ Former::close() }}   

@stop
