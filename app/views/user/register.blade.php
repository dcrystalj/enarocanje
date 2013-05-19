@extends('layouts.default')

@section('title')
    {{trans('general.userRegistration')}}
@stop

@section('content')
<script>

</script>


{{Former::open(URL::route('user.store'))->rules($rules)->id('userRegForm')}}
{{Former::text('name',trans('general.name'))->autofocus()}}
{{Former::text('surname',trans('general.surname'))}}
{{Former::text('email',trans('general.email'))}}
{{Former::password('password',trans('general.password'))}}
{{Former::password('repeat',trans('general.repeatPassword'))}}
{{Former::select('timezone',trans('general.timezone'))
		->options(UserLibrary::timezones(),	'12') }}
{{Former::select('language',trans('general.language'))->options(trans('general.languages'))}}
{{Former::actions()->button(trans('general.submit'))->onclick("checkEmail(event,'#userRegForm')")}}
{{Former::close()}}


@stop
