@extends('layouts.default')

@section('title')
    {{Lang::get('user.userProfile')}}
@stop

@section('content')

{{Former::label(Lang::get('user.name').': '.$user->name)}}
{{Former::label(Lang::get('user.surname').': '.$user->surname)}}
{{Former::label(Lang::get('user.email').': '.$user->email)}}
{{Former::label(Lang::get('user.timezone').': '.$user->time_zone)}}

@if(is_int($user->language)) 
{{ Former::label(Lang::get('user.language').': '.
	UserLibrary::language($user->language)) }}
@endif

{{Button::link(URL::route('user.edit', Auth::user()->id), 
		Lang::get('user.editSettings')) }}

{{Button::link(URL::route('referral.create'), 
		Lang::get('user.refer'))}}
@stop
