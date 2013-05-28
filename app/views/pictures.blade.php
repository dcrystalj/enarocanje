@extends('layouts.default')

@section('title')
	{{trans('general.pictures')}}
@stop

@section('content')
    <script src="js/lightbox/js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox/js/lightbox.js"></script>
    <link href="js/lightbox/css/lightbox.css" rel="stylesheet" />
	<?php

	?>
	{{Former::open_for_files(URL::to('providerSavePictures'),'POST')->id('picturesForm')}}
	{{Former::file("picture",trans('general.picture'))->accept('image')->max(5, 'MB')}}
	{{Former::actions()->submit(trans('general.submit'))}}

	{{Former::close()}}


@foreach (UserLibrary::getPicturesFromMacservice() as $picture)

	{{UserLibrary::getImageWithSize($picture->path,'200px','200px').'<br />'}}
@endforeach

@stop
