@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    
    @if(isset($mac))
        @if(isset($mic))
            {{ Former::open(URL::route('macro.micro.update', [$mac->id, $mic->id] ))->method('PUT')->rules($rules) }}
            {{ Former::populate($mic) }}
        @else
            {{ Former::open(URL::route('macro.micro.store',$mac->id))->rules($rules) }}
        @endif

        @if (isset($service))
            <p> Add services to {{$service()->name }} </p>
        @endif

        {{ Former::select('name','Service:')->options(Service::micro())->autofocus() }}
        {{ Former::select('length','Length:')->options(Service::duration()) }} 
        {{ Former::textarea('description','Description:')->rows(10)->columns(20) }}
        {{ Former::Number('price','Price:') }}
        {{ Former::actions()->submit( isset($mic) ? 'Edit' : 'Add service' ) }}
        {{ Former::close() }}   

        <?php 
            $microservice   = $mac->microservices;
            $duration       = Service::duration();
            $allActivated   = []; 
            $allDeactivated = [];
            $i              = 1; 
            foreach ($microservice as $service){
                if($service->isActive())
                {
                    
                    $allActivated[]= [
                        'id'     => $i, 
                        'name'   => $service->name, 
                        'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length  , 
                        'desc'   => $service->description, 
                        'price'  => $service->price, 
                        'link'   => Html::link(
                                        URL::route('macro.micro.edit',
                                            [$mac->id, $service->id]), 'Edit'),
                        'deactivate'  => deactivate($mac->id, $service),

                     ];
                     $i++;
                }
                else{

                    $allDeactivated[] = [
                        'name'        => $service->name, 
                        'description' => $service->description, 
                        'link1'       => activate($mac->id, $service)
                     ];
                }
            }
        ?>

        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Length', 'Description', 'Price', '', '') }}
        {{ Table::body($allActivated) }}
        {{ Table::close() }}

        @if(count($allDeactivated)>0)
            </br>
            <h2>Deactivated:</h2>
            {{ Table::hover_open(["class"=>'sortable']) }}
            {{ Table::headers( 'Name', 'Description', '', '') }}
            {{ Table::body($allDeactivated) }}
            {{ Table::close() }}
        @endif

    @endif

    <?php 
    function deactivate($macId,$mic)
    {
        $deactivate =   Form::open( array(
            'method' => 'DELETE', 
            'url' => URL::route(
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
                'on: ' . date("d-m-Y",strtotime($mic->activefrom))
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
                'on: ' . date("d-m-Y",strtotime($mic->activefrom))
            );
        }

        $activate .=    Form::close();

        return $activate;
    }

    ?>

    @include('micro.activatefrom')
    
@stop
