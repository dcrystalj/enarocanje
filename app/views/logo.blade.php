@extends('layouts.default')

@section('title')
	{{trans('general.logo')}}
@stop

@section('content')
    <script src="js/lightbox/js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox/js/lightbox.js"></script>
    <link href="js/lightbox/css/lightbox.css" rel="stylesheet" />
    <script>
   alert('ooo');
    $("div.testdiv").click(function(){
    	alert('wasd');
	});
	$(".testdiv").click(function(){
	  // Holds the product ID of the clicked element
	  alert('wasabi');
	});
	
	</script>
	<?php
		$logoPath = Auth::user()->macroservices()->where('user_id','=',Auth::user()->id)->first()->logo;
		function isSetLogo($logoPath)
		{
			//returns true, if logo is set, false otherwise
			if($logoPath == '')
			{
				return false;
			}
			return true;
		}
	?>
	{{'<div class="testdiv" style="height:100px; width:100px; background-color:blue;"></div>'}}
	{{Former::open_for_files(URL::to('providerSaveLogo'),'POST')->id('logoForm')}}
	{{Former::file("logo",trans('general.logo'))->accept('image')->max(2, 'MB')}}
{{Former::actions()->submit(trans('general.submit'))}}
@if(isSetLogo($logoPath))
	{{UserLibrary::getImageWithSize($logoPath,'200px','100px')}}
	{{'<br /><br /><br />'}}
{{Button::link(URL::to('providerDeleteLogo'),trans('general.deleteCurrentLogo'))}}
@endif
	{{Former::close()}}


@stop
