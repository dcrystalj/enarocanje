@extends('layouts.default')

@section('title')
	{{trans('general.logo')}}
@stop

@section('content')
<script>

</script>

{{Former::open_for_files(URL::to('providerSaveLogo'),'POST')->id('logoForm')}}
{{Former::file("image")->accept('image')->max(10, 'MB')}}
{{Former::submit(trans('general.submit'))}}
@if(false)
{{Former::button(trans('general.deleteCurrentLogo'))}}
@endif
{{Former::close()}}

<?php
	function isSetLogo()
	{
		$macservice = Auth::user()->macroservices()->where('user_id','=',Auth::user()->id)->first();
		//var_dump($macservice->logo);
		if($macservice->logo == '')
		{
			return false;
		}
		return true;
	}
?>

@stop
