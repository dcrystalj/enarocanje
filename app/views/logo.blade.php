@extends('layouts.default')

@section('title')
	{{trans('general.logo')}}
@stop

@section('content')
<script>

</script>

{{Former::open_for_files(URL::to('providerSaveLogo'),'POST')->id('logoForm')}}
{{Form::file("image",array('id'=> 'some_id'))}}
{{Former::submit(trans('general.submit'))}}

{{Former::close()}}


@stop
