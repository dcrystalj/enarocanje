@extends('layouts.default')

@section('title')
    {{Lang::get('general.userRegistration')}}
@stop

@section('content')
<script>

</script>


{{Former::open(URL::route('user.store'))->rules($rules)->id('userRegForm')}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::text('email',Lang::get('general.email'))}}
{{Former::password('password',Lang::get('general.password'))}}
{{Former::password('repeat',Lang::get('general.repeatPassword'))}}
{{Former::select('timezone',Lang::get('general.timezone'))
		->options(UserLibrary::timezones(),	'12') }}
{{Former::select('language',Lang::get('general.language'))->options(Lang::get('general.languages'))}}
{{Former::actions()->button(Lang::get('general.submit'))->onclick("checkEmail(event,'#userRegForm')")}}
{{Former::close()}}


@stop
