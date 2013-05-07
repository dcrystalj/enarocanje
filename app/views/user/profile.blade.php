@extends('layouts.default')

@section('title')
    {{Lang::get('general.userProfile')}}
@stop

@section('content')

{{Former::label(Lang::get('general.name').': '.$user->name)}}
{{Former::label(Lang::get('general.surname').': '.$user->surname)}}
{{Former::label(Lang::get('general.email').': '.$user->email)}}
{{Former::label(Lang::get('general.timezone').': '.$user->time_zone)}}

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
