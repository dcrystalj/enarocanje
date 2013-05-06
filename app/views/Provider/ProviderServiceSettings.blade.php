@extends('layouts.default')

@section('title')
    {{Lang::get('provider.providerSettings')}}
@stop

@section('content')

    @if (isset($message))
        <p>{{ Alert::warning($message) }}</p>
    @endif
    
    <?php $user = Auth::user() ?>

    {{ Former::open(URL::route('provider.update', $user->id))
                ->rules($rules)
                ->method('PUT') }}
    {{ Former::populate($user) }}
    {{ Former::text('name',Lang::get('provider.name'.': '))->autofocus() }}
    {{ Former::text('surname',Lang::get('provider.surname'.': ')) }}
    {{ Former::select('language',Lang::get('provider.language'.': '))->options(
    UserLibrary::languages()) }}
    {{ Former::password('password',Lang::get('provider.changePassword'.': ')) }}
    {{ Former::password('password_confirmation',Lang::get('provider.retypePassword'.': ')) }}
    {{ Former::actions()->submit(Lang::get('provider.saveChanges'.': ')) }}
    {{ Former::close() }}   
@stop