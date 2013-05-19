@extends('layouts.default')

@section('title')
    {{trans('general.userProfile')}}
@stop

@section('content')

@if(!empty($user->name)) 
	{{Former::label(trans('general.name').': '.$user->name)}}
@endif

@if(!empty($user->surname)) 
	{{Former::label(trans('general.surname').': '.$user->surname)}}
@endif

{{Former::label(trans('general.email').': '.$user->email)}}

@if(is_int($user->timezone)) 
	{{Former::label(trans('general.timezone').': '.UserLibrary::timezone($user->time_zone))}}
@endif

@if(is_int($user->language)) 
	{{ Former::label(trans('general.language').': '.
	UserLibrary::language($user->language)) }}
@endif

{{Button::link(URL::route('user.edit', Auth::user()->id), 
		trans('general.editSettings')) }}

{{Button::link(URL::route('referral.create'), 
		trans('general.refer'))}}

{{Button::link(URL::to('/google/export/reservations'), trans('general.exportReservations')) }}

@stop
