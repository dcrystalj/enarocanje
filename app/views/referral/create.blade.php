@extends('layouts.default')

@section('title')
    {{trans('messages.referAFriend')}}
@stop

@section('content')

    {{ Former::open(URL::route('referral.store'))->rules($rules) }}
    {{ Former::text('to',trans('general.to').':')}}
    {{ Former::text('content',trans('general.subject').':') }}
       Referral link: {{ Typography::info($link) }}
    {{ Former::actions()->submit(trans('general.sendReferral') ) }}
    {{ Former::close() }}   

@stop
