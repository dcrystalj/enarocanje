@extends('layouts.default')

@section('title')
    {{Lang::get('services.manageService')}}
@stop

@section('content')
    <style>
        .btn-large{
            margin-bottom: 10px;
            width: 100px;
        }
        .form-actions{
            background-color: white !important;
        }
    </style>
    <?php $mac = Auth::user()->macroservices()->first(); ?>
    <div class="row-fluid">
      <div class="span5">
        @if(isset($mac))
            {{ Former::open(URL::route('macro.update', $mac->id ))->method('PUT')->rules($rules) }}
            {{ Former::populate($mac) }}
        @else
            {{ Former::open(URL::route('macro.store'))->rules($rules) }}
        @endif

        {{ Former::select('name',Lang::get('services.name').': ')->options(Service::categories())->autofocus() }}
        {{ Former::select('ZIP_code',Lang::get('services.zipCode').':')->options(Service::zip())}}
        {{ Former::text('street',Lang::get('services.').': ')}}
        {{ Former::text('email',Lang::get('services.email').': ')->value(Auth::user()->email)}}
        {{ Former::text('telephone_number',Lang::get('services.telephoneNumber').': ')}}
        {{ Former::text('site_url',Lang::get('services.urlToYourSite').': ')}}
        {{ Former::textarea('description',Lang::get('services.description').': ')->rows(10)->columns(20) }}
        {{ Former::actions()->large_submit( isset($mac) ? Lang::get('services.saveChanges') : Lang::get('services.addService')) }}
        {{ Former::close() }}   

    </div>
    <div class="span1">
        @if($mac->active==0 )
        	{{Button::large_link(URL::route('timetable', $mac->id), 'Timetable')}}
            {{Button::large_link(URL::route('macro.absence.create', $mac->id), 'Absences')}}
            {{Button::large_link( URL::route('macro.micro.create',$mac->id), 'Services')}}
        @endif
        </div>  
    </div>
   

@stop
