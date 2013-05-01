@extends('layouts.default')

@section('title')
    User registration
@stop

@section('content')
<?php

?>
{{Former::open('user')->rules($rules)}}
{{Former::text('name',Lang::get('user.Name'))->autofocus()}}
{{Former::text('surname',Lang::get('user.Surname'))}}
{{Former::text('email',Lang::get('user.Email'))}}
{{Former::password('password',Lang::get('user.Password'))}}
{{Former::password('repeat',Lang::get('user.RepeatPassword'))}}
{{Former::select('timezone',Lang::get('user.Timezone'))->options(UserLibrary::timezones(),"UTC",true)}}
{{Former::select('language',Lang::get('user.Language'))->options(UserLibrary::languages())}}
{{Former::actions()->submit(Lang::get('user.Submit'))}}
{{Former::close()}}

@stop