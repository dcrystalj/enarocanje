@extends('layouts.default')

@section('title')
    {{Lang::get('user.userRegistraion')}}
@stop

@section('content')
{{Former::open('user')->rules($rules)}}
{{Former::text('name',Lang::get('user.name'))->autofocus()}}
{{Former::text('surname',Lang::get('user.surname'))}}
{{Former::text('email',Lang::get('user.email'))}}
{{Former::password('password',Lang::get('user.password'))}}
{{Former::password('repeat',Lang::get('user.repeatPassword'))}}
{{Former::select('timezone',Lang::get('user.timezone'))->options(UserLibrary::timezones(),"UTC+1",true)}}
{{Former::select('language',Lang::get('user.language'))->options(Lang::get('user.languages'))}}
{{Former::actions()->submit(Lang::get('user.submit'))}}
{{Former::close()}}

@stop