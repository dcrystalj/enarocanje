@extends('layouts.default')

@section('title')
    {{trans('general.manageServices')}}
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

        {{ Former::select('name',trans('general.service').':')->options(Service::micro($mac->name))->autofocus() }}
        {{ Former::text('title',trans('general.title').':') }}
        {{ Former::select('gender',trans('general.forCapital').':')->options(Service::gender()) }} 

        @if($errors && $errors->has('length'))
            <div class="control-group error">
        @else
            <div class="control-group required">
        @endif

            {{ Former::label(trans('general.length').':')->class('control-label')->for('datetimepicker')}}
            <div class="controls">
            <div id="datetimepicker2" class="input-append date">
                <input data-format="hh:mm" type="text" name="length" value="{{ (isset($mic))? substr($mic->length,0,-3) : '00:00' }}" ></input>
                <span class="add-on">
                   <i data-time-icon="icon-time"></i>
                </span>
            </div>
            @if($errors && $errors->has('length'))
                <span class="help-inline"> {{$errors->first('length')}}</span>
            @endif
            </div>
        </div>

        {{ Former::text('price',trans('general.price').':')->append('€')->pattern('[+-]?\d*[\.,]?\d+') }}
        {{ Former::textarea('description',trans('general.description').':')->rows(10)->columns(20) }}
        {{ Former::actions()->submit( isset($mic) ? trans('general.saveChanges') : trans('general.addService') ) }}
        {{ Former::close() }}   

        <?php 
        $microservice   = $mac->microservices;
        $length = 0;
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
                if(substr($service->length,0,-6) == '00')
                {
                    $length = Service::lengthMin($service->length);
                }    
                else
                {
                    $length = Service::lengthH($service->length);
                    $length .= Service::lengthMin($service->length);
                }

                $allActivated[]= [
                    'id'     => $i, 
                    'title'   => $service->title, 
                    'length' => $length,
                    'gender' => Service::gender()[$service->gender], 
                    'price'  => $service->price, 

                    'link'   => Button::link(
                                    URL::route('macro.micro.edit',
                                        [$mac->id, $service->id]), trans('general.edit')),

                    'showReserv'  => Button::link(
                                    URL::route('macro.micro.reservation.show',
                                        [$mac->id, $service->id, 0]), trans('general.showReservations')),

                    'deactivate'  => deactivate($mac->id, $service),

                 ];
                 $i++;
            }
            else if(!$service->isActive()){
                $allDeactivated[] = [
                    'title'        => $service->title, 
                    'link1'       => activate($mac->id, $service)
                 ];
            }
        }
        ?>

        {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
        {{ Table::headers('#', trans('general.name'), trans('general.length'),trans('general.gender'), trans('general.price').'(€)', '', '', '') }}
        {{ Table::body($allActivated) }}
        {{ Table::close() }}

        @if(count($allDeactivated)>0)
            </br>
            <h2>{{trans('general.deactivated')}}:</h2>
            {{ Table::hover_open(["class"=>'sortable','id'=> 'mobileTable']) }}
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
        $deactivate .=    Form::submit(trans('general.deactivate'));

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
            'url'    => URL::route('microactivate', [$macId,$mic->id]))
        );
        $activate .=    Form::hidden('date',null,['id'=>'hiddendate']);
        $activate .=    Form::submit(trans('general.activate'),['class'    => 'activate']);

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
