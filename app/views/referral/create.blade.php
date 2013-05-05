@extends('layouts.default')

@section('title')
    Refer a friend
@stop

@section('content')

    {{ Former::open(URL::route('referral.store',Auth::user()->id))->rules($rules) }}
    {{ Former::text('to','To:')}}
    {{ Former::textarea('content','Content:') }}
    {{ Former::actions()->submit('Send referral' ) }}
    {{ Former::close() }}   

@stop
