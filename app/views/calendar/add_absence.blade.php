@extends('layouts.default')

@section('title')
    Add absences
@stop

@section('content')
    
    {{ Former::open() }} 
    {{ Former::select('name','Service:')->options(Service::categories())->autofocus() }}
    {{ Former::select('ZIPcode','ZIP code:')->options($codes)}}
    {{ Former::text('street','Street:')}}
    {{ Former::text('email','Email:')->value(Auth::user()->email)}}
    {{ Former::text('telN','Telephone Number:')}}
    {{ Former::text('SiteUrl','URL to your site:')}}
    {{ Former::textarea('description','Description:')->rows(10)->columns(20) }}
    {{ Former::actions()->submit( isset($mac) ? 'Edit' : 'Add service' ) }}
    {{ Former::close() }}   

@stop
