@extends('layouts.default')

@section('title')
    {{Lang::get('general.userProfile')}}
@stop

@section('content')

@if(!empty($user->name)) 
	{{Former::label(Lang::get('general.name').': '.$user->name)}}
@endif

@if(!empty($user->surname)) 
	{{Former::label(Lang::get('general.surname').': '.$user->surname)}}
@endif

{{Former::label(Lang::get('general.email').': '.$user->email)}}

@if(is_int($user->timezone)) 
	{{Former::label(Lang::get('general.timezone').': '.UserLibrary::timezone($user->time_zone))}}
@endif

@if(is_int($user->language)) 
	{{ Former::label(Lang::get('general.language').': '.
	UserLibrary::language($user->language)) }}
@endif

{{Button::link(URL::route('user.edit', Auth::user()->id), 
		Lang::get('general.editSettings')) }}

{{Button::link(URL::route('referral.create'), 
		Lang::get('general.refer'))}}

{{Button::link(URL::to('/google/export/reservations'), Lang::get('general.exportReservations')) }}

@stop
