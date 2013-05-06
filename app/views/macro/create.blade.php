@extends('layouts.default')

@section('title')
    {{Lang::get('services.manageService')}}
@stop

@section('content')
<?php

     $zipCode = ZIPcode::All();
     foreach ($zipCode as $z) {
         $codes[$z->ZIP_code] = $z->ZIP_code . ' ' . $z->city;
     }
?>
    
     @if(isset($mac))
        {{ Former::open(URL::route('macro.update', $mac->id ))->method('PUT')->rules($rules) }}
        {{ Former::populate($mac) }}
    @else
        {{ Former::open(URL::route('macro.store'))->rules($rules) }}
    @endif
    {{ Former::select('name',Lang::get('services.name').': ')->options(Service::categories())->autofocus() }}
    {{ Former::select('ZIP_code',Lang::get('services.zipCode').':')->options($codes)}}
    {{ Former::text('street',Lang::get('services.').': ')}}
    {{ Former::text('email',Lang::get('services.email').': ')->value(Auth::user()->email)}}
    {{ Former::text('telephone_number',Lang::get('services.telephoneNumber').': ')}}
    {{ Former::text('site_url',Lang::get('services.urlToYourSite').': ')}}
    {{ Former::textarea('description',Lang::get('services.description').': ')->rows(10)->columns(20) }}
    {{ Former::actions()->submit( isset($mac) ? Lang::get('services.saveChanges') : Lang::get('services.addService')) }}
    {{ Former::close() }}   


   
@stop
