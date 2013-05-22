@extends('layouts.default')

@section('title')
    Logo
@stop

@section('content')
<script>

</script>


{{Former::open_for_files()->id('logoForm')}}
{{Form::file("file")}}
{{$file = Input::file('opera')}}
{{Html::image($file)}}
{{Former::actions()->button(trans('general.submit'))->onclick("")}}

{{Former::close()}}


@stop
