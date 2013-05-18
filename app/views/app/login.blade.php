@extends('layouts.default')

@section('title')
{{trans('general.login')}}
@stop

@section('content')

    {{ Former::open(URL::action('AppController@postLogin')) }}
    {{ Former::text('email',Lang::get('general.email').':')->autofocus()->value(empty($email) ? '' : $email) }}
    {{ Former::password('password',Lang::get('general.password').':')->id('Password') }}
    {{ Former::actions()->submit(Lang::get('general.login')) }}
    {{ Former::close() }}   
    <p>{{trans('messages.forgot')}}: {{Html::link(URL::action('AppController@getForgot'))}}</p>
@stop