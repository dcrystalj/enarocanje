@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    
    @if(isset($mac))
        <h3> {{ $mac->name }} </h3>
        @if(isset($mic))
            {{ Former::open(URL::route('macro.micro.update', [$mac->id, $mic->id] ))->method('PUT')->rules($rules) }}
            {{ Former::populate($mic) }}
        @else
            {{ Former::open(URL::route('macro.micro.store',$mac->id))->rules($rules) }}
        @endif

        {{ Former::select('name','Service:')->options(Service::micro($mac->name))->autofocus() }}
        {{ Former::text('title','Title:') }}

        @if($errors && $errors->has('length'))
            <div class="control-group error">
        @else
            <div class="control-group required">
        @endif

            {{ Former::label('length','Length:')->class('control-label')->for('datetimepicker')}}
            <div class="controls">
            <div id="datetimepicker2" class="input-append date">
                <input data-format="hh:mm" type="text" name="length" value="<?php if (isset($mic)) echo $mic->length ?>" ></input>
                <span class="add-on">
                   <i data-time-icon="icon-time"></i>
                </span>
            </div>
            @if($errors && $errors->has('length'))
                <span class="help-inline"> {{$errors->first('length')}}</span>
            @endif
            </div>
        </div>

        {{ Former::select('gender','For:')->options(Service::gender()) }} 
        {{ Former::text('price','Price:')->append('€')->pattern('[+-]?\d*[\.,]?\d+') }}
        {{ Former::textarea('description','Description:')->rows(10)->columns(20) }}
        {{ Former::actions()->submit( isset($mic) ? 'Save changes' : 'Add service' ) }}
        {{ Former::close() }}   

        <?php 
        $microservice   = $mac->microservices;
        $duration       = Service::duration();
        $allActivated   = []; 
        $allDeactivated = [];
        $i              = 1; 
        $category = Service::categoryId($mac->name);
        foreach ($microservice as $service){
            if($service->isActive() && $service->category == $category)
            {
                if($service->price == 0){
                    $service->price = '/';
                }
                $allActivated[]= [
                    'id'     => $i, 
                    'name'   => Service::services()[$category][$service->name], 
                    'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length  ,
                    'gender' => Service::gender()[$service->gender], 
                    'price'  => $service->price, 

                    'link'   => Button::link(
                                    URL::route('macro.micro.edit',
                                        [$mac->id, $service->id]), 'Edit'),

                    'showReserv'  => Button::link(
                                    URL::route('macro.micro.reservation.show',
                                        [$mac->id, $service->id, 0]), 'Show reservations'),

                    'deactivate'  => deactivate($mac->id, $service),

                 ];
                 $i++;
            }
            else if(!$service->isActive()){
                $allDeactivated[] = [
                    'name'        => Service::services()[$category][$service->name], 
                    'link1'       => activate($mac->id, $service)
                 ];
            }
        }
        ?>

        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Length','Gender', 'Price(€)', '', '', '') }}
        {{ Table::body($allActivated) }}
        {{ Table::close() }}

        @if(count($allDeactivated)>0)
            </br>
            <h2>Deactivated:</h2>
            {{ Table::hover_open(["class"=>'sortable']) }}
            {{ Table::headers( 'Name', '', '') }}
            {{ Table::body($allDeactivated) }}
            {{ Table::close() }}
        @endif

    @endif

    <?php 
    function deactivate($macId,$mic)
    {
        $deactivate =   Form::open( array(
            'method' => 'DELETE', 
            'url'    => URL::route(
                'macro.micro.destroy',
                [$macId,$mic->id]),
                'class'    => 'deactivate'
            )
        );
        $deactivate .=    Form::hidden('date','',['id'=>'hiddendate']);
        $deactivate .=    Form::submit('Deactivate');

        if(strtotime($mic->activefrom) > strtotime(date("Y-m-d")) )
        {
            $deactivate .= Form::label(
                'label',
                'on: ' . date("Y-m-d",strtotime($mic->activefrom))
            );
        }

        $deactivate .=    Form::close();

        return $deactivate;
    }
    function activate($macId,$mic)
    {
        $activate = Form::open( array(
            'method' => 'GET', 
            'url'    => URL::route(
                'microactivate', 
                [$macId,$mic->id]),
                'class'    => 'activate'
            )
        );
        $activate .=    Form::hidden('date','',['id'=>'hiddendate']);
        $activate .=    Form::submit('Activate');

        if(strtotime($mic->activefrom) > strtotime(date("Y-m-d")))
        {
            $activate .= Form::label(
                'label',
                'on: ' . date("Y-m-d",strtotime($mic->activefrom))
            );
        }

        $activate .=    Form::close();

        return $activate;
    }

    ?>

    @include('micro.activatefrom')
    
@stop
