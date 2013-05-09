@extends('layouts.default')

@section('title')
    {{Lang::get('general.userRegistration')}}
@stop

@section('content')
{{Former::open(URL::route('user.store'))->rules($rules)}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::text('email',Lang::get('general.email'))}}
{{Former::password('password',Lang::get('general.password'))}}
{{Former::password('repeat',Lang::get('general.repeatPassword'))}}
{{Former::select('timezone',Lang::get('general.timezone'))
		->options(UserLibrary::timezones(),	'12') }}
{{Former::select('language',Lang::get('general.language'))->options(Lang::get('general.languages'))}}
{{Former::actions()->submit(Lang::get('general.submit'))}}
{{Former::close()}}

@stop