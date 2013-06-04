@extends('layouts.default')

@section('title')
	{{trans('general.home')}}
@stop

@section('content')

	@if (Auth::check())
	<p>{{trans('general.welcome'); Auth::user()->name }} </p>
	@endif

	{{ Carousel::create([
	array(
		'image'=>'img/massage.jpg',
		'label'=>'Massage', 
		'caption'=>'Best massage in china.'
	),
	array(
		'image'=>'img/pedicure.jpg', 
		'label'=>'Pedicure', 
		'caption'=>'Best pedicure on planet!.'
	),
	array(
		'image'=>'img/haircut.jpg', 
		'label'=>'Haircut', 
		'caption'=>'Best haircut on earth.'
	),
	]) }}
@stop