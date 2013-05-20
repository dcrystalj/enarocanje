@extends('layouts.default')

@section('title')
    {{Lang::get('general.manageService')}}
@stop

@section('content')

    <?php 
    $zipcode = [];
    $city = [];
    $category = [];
    $mac = Auth::user()->macroservices()->first(); 
    $zip = ZIPcode::all();
    $category = Service::categories();
    foreach ($zip as $z) {
        $zipcode[] = $z->ZIP_code;
        $city[] = $z->city;
    }
    ?>
    <div class="row-fluid">
      <div class="span5">
        @if(isset($mac))
            {{ Former::open(URL::route('macro.update', $mac->id ))->method('PUT')->rules($rules) }}
            {{ Former::populate($mac) }}
            {{ Former::select('name',Lang::get('general.name').': ')->options($category)->autofocus()->disabled() }}
        @else
            {{ Former::open(URL::route('macro.store'))->rules($rules) }}
            {{ Former::select('name',Lang::get('general.name').': ')->options($category)->autofocus() }}
        @endif
        {{ Former::text('ZIP_code',trans('general.zipCode').':')->data_Items('8')->data_provide('typeahead')->data_source('["'.implode('","',$zipcode).'"]')->autocomplete('off')}}
        {{ Former::text('city',trans('general.city').':')->data_Items('8')->data_provide('typeahead')->data_source('["'.implode('","',$city).'"]')->autocomplete('off')}}
        {{ Former::text('street',Lang::get('general.street').': ')}}
        {{ Former::text('email',Lang::get('general.email').': ')->value(Auth::user()->email)}}
        {{ Former::text('telephone_number',Lang::get('general.telephoneNumber').': ')}}
        {{ Former::text('site_url',Lang::get('general.urlToYourSite').': ')}}
        {{ Former::textarea('description',Lang::get('general.description').': ')->rows(10)->columns(20) }}
        {{ Former::actions()->large_submit( isset($mac) ? Lang::get('general.saveChanges') : Lang::get('general.addService')) }}
        {{ Former::close() }}   

    </div>
    <div class="span5 offset2">
        @if( isset($mac) && $mac->active==0 )
    	
        {{Button::large_link(URL::route('timetable', $mac->id), Lang::get('general.timetable'))}}
        {{Button::large_link(URL::route('macro.absence.create', $mac->id), Lang::get('general.absences'))}}
        {{Button::large_link( URL::route('macro.micro.create',$mac->id), Lang::get('general.justservices'))}}
        {{Button::large_link( URL::to('google/export/service_reservation'), trans('general.exportReservations'))}}
        {{Button::danger_large_link(URL::route('macro.destroy',$mac->id),trans('general.delete'),array('id' => 'delete'))}}


        {{ Former::open(URL::route('macro.destroy',$mac->id))->method('DELETE')->id('delForm')}}, 
        {{ Former::danger_large_submit(trans('general.delete')) }}
        {{ Former::close() }}                  

        <script type="text/javascript">
                $('#delete').click(function(e) {
                    e.preventDefault();
                    bootbox.confirm('Are you sure to delete all services?', function(result) {
                        if(result){
                            $('#delForm').submit();
                        }
                        $('#event-dialog').modal('hide');
                    });
                });
        </script>

    @endif
        </div>  
    </div>

@stop
