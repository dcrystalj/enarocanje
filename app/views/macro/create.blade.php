@extends('layouts.default')

@section('title')
    Manage Services
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

        {{ Former::select('name','Service:')->options(Service::categories())->autofocus() }}
        {{ Former::select('ZIP_code','ZIP code:')->options(Service::zip())}}
        {{ Former::text('street','Street:')}}
        {{ Former::text('email','Email:')->value(Auth::user()->email)}}
        {{ Former::text('telephone_number','Telephone Number:')}}
        {{ Former::text('site_url','URL to your site:')}}
        {{ Former::textarea('description','Description:')->rows(10)->columns(20) }}
        {{ Former::actions()->large_submit( isset($mac) ? 'Edit' : 'Save' ) }}
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
