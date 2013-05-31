@extends('layouts.default')

@section('title')
    {{trans('general.manageService')}}
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
    <div class="offset1 span2">
        @if( isset($mac) && $mac->active==0 )
        
        {{Button::large_link(URL::route('timetable', $mac->id), trans('general.timetable'))}}
        {{Button::large_link(URL::route('macro.absence.create', $mac->id), trans('general.absences'))}}
        {{Button::large_link( URL::route('macro.micro.create',$mac->id), trans('general.justservices'))}}
	@if(Auth::user()->gtoken)
	{{Button::danger_large_link( URL::to('google/disable_sync'), trans('general.unsync'),array('id' => 'unsync'))}}
	@else
        {{Button::large_link( URL::to('google/export/service_reservation'), trans('general.sync'))}}
	@endif
        {{Button::danger_large_link(URL::route('macro.destroy',$mac->id),trans('general.delete'),array('id' => 'delete'))}}


        {{ Former::open(URL::route('macro.destroy',$mac->id))->method('DELETE')->id('delForm')}}, 
        {{ Former::danger_large_submit(trans('general.delete')) }}
        {{ Former::close() }}
    </div>
    @endif
    <div class="offset2 span5">
        @if(isset($mac))
            {{ Former::open(URL::route('macro.update', $mac->id ))->method('PUT')->rules($rules) }}
            {{ Former::populate($mac) }}
            {{ Former::select('name',Lang::get('general.name').': ')->options($category)->autofocus()->disabled() }}
        @else
            {{ Former::open(URL::route('macro.store'))->rules($rules) }}
            {{ Former::select('name',Lang::get('general.name').': ')->options($category)->autofocus() }}
        @endif
        {{ Former::text('title',trans('general.title'). ':') }}
        {{ Former::text('ZIP_code',trans('general.zipCode').':')->data_Items('8')->data_provide('typeahead')->data_source('["'.implode('","',$zipcode).'"]')->autocomplete('off')}}
        {{ Former::text('city',trans('general.city').':')->data_Items('8')->data_provide('typeahead')->data_source('["'.implode('","',$city).'"]')->autocomplete('off')}}
        {{ Former::text('street',trans('general.street').': ')}}
        {{ Former::text('email',trans('general.email').': ')->value(Auth::user()->email)}}
        {{ Former::text('telephone_number',trans('general.telephoneNumber').': ')}}
        {{ Former::text('site_url',trans('general.urlToYourSite').': ')}}
        {{ Former::textarea('description',trans('general.description').': ')->rows(10)->columns(20) }}
        {{ Former::actions()->large_submit( isset($mac) ? trans('general.saveChanges') : trans('general.addService')) }}
        {{ Former::close() }}   

    </div>
 
    </div>
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
      $('#unsync').click(function(e) {
	  e.preventDefault();
	  var location = $(this).attr('href');
	  bootbox.dialog('<?php print trans("messages.deleteEvents") ?>', [
	      {
		  "label" : "<?php echo trans('general.yes') ?>",
		  "class" : "btn-success",
		  "callback": function() {
		      document.location.href = location+"?delete_events=1";
		  }
	      }, 
	      {
		  "label" : "<?php echo trans('general.no') ?>",
		  "class" : "btn-primary",
		  "callback": function() {
		      document.location.href = location;
		  }
	      }, 
	      { 
		  "label" : "<?php echo trans('general.cancel') ?>",
		  "class" : "btn"
	      },]);
      });
    </script>
@stop
