@extends('layouts.default')

@section('title')
{{trans('general.selectCalendar')}}
@stop

@section('content')
	{{trans('messages.loginToGoogleAPI')}}: <a href="<?= $url ?>">Login</a>
@stop