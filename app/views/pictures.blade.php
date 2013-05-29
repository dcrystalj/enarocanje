@extends('layouts.default')

@section('title')
	{{trans('general.pictures')}}
@stop
	{{Html2::style('css/images.css')}}
@section('content')

	<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>



	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
	</script>

	


	<?php

	?>
	{{Former::open_for_files(URL::to('providerSavePicture'),'POST')->id('picturesForm')}}
	{{Former::file("picture",trans('general.picture'))->accept('image')->max(5, 'MB')}}
	{{Former::actions()->submit(trans('general.submit'))}}

	{{Former::close()}}
	<?php
	$pictures = UserLibrary::getPicturesFromMacservice();
	//var_dump($pictures);
	?>
	@for($i=0;$i<count($pictures);$i++) 
	{{UserLibrary::getPictureForGallery($pictures[$i]->path)}}

	@endfor
	


@stop	


