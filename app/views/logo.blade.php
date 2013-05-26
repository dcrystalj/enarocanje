@extends('layouts.default')

@section('title')
	{{trans('general.logo')}}
@stop

@section('content')
<script>

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
{{Former::open_for_files(URL::to('providerSaveLogo'),'POST')->id('logoForm')}}
{{Former::file("image")->accept('image')->max(2, 'MB')}}
{{Former::submit(trans('general.submit'))}}
@if(isSetLogo($logoPath))
{{'<br /><br /><br />'}}
{{UserLibrary::getImageLogo($logoPath)}}
{{'<br /><br /><br />'}}
{{Button::link(URL::to('providerDeleteLogo'),trans('general.deleteCurrentLogo'))}}
@endif
{{Former::close()}}



@stop
