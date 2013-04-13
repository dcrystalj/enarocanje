@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    
    <?php 
        $duration[15]="15 min";
        $duration[30]="30 min";
        $duration[45]="45 min";
        $duration[60]="1 h";
        $duration[75]="1 h 15 min";
        $duration[90]="1h 30 min";
        $duration[105]="1h 45 min";
        $duration[120]="2 h";
    ?>
    
    @if(isset($mac))
        @if(isset($mic))
            {{ Former::open(URL::route('macro.micro.update', [$mac->id, $mic->id] ))->method('PUT')->rules($rules) }}
            {{ Former::populate($mic) }}
        @else
            {{ Former::open(URL::route('macro.micro.store',$mac->id))->rules($rules) }}
        @endif

        {{ Former::text('name','Service name:')->autofocus() }}
        {{ Former::text('name','Name:')->autofocus() }}
        {{ Former::select('length','Length:')->options($duration) }} 
        {{ Former::textarea('description','Description:')->rows(10)->columns(20) }}
        {{ Former::Number('price','Price:') }}
        {{ Former::actions()->submit( isset($mic) ? 'Edit' : 'Add service' ) }}
        {{ Former::close() }}   

        <?php 
            $microservice = $mac->microservices;
            $allActivated = []; 
            $allDeactivated = [];
            $i = 1; 
            foreach ($microservice as $service){
                if($service->active==0)
                {
                    $deactivate =    Form::open(array('method' => 'DELETE', 
                                                    'url' => URL::route('macro.micro.destroy',[$mac->id,$service->id])));
                    $deactivate .=    Form::submit('Deactivate');
                    $deactivate .=    Form::close();
            
                    $allActivated[]= [
                        'id'     => $i, 
                        'name'   => $service->name, 
                        'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length  , 
                        'desc'   => $service->description, 
                        'price'  => $service->price, 
                        'link'   => Html::link(URL::route('macro.micro.edit',[$mac->id, $service->id]),'Edit') ,
                        'deactivate'  => $deactivate
                     ];
                     $i++;
                }
                else{
                    $activate =    Form::open(array('method' => 'GET', 
                                                    'url' => URL::route('microactivate',[$mac->id,$service->id])));
                    $activate .=    Form::submit('Activate');
                    $activate .=    Form::close();
            
                    $allDeactivated[] = [
                        'name'        => $service->name, 
                        'description' => $service->description, 
                        'link1'       => $activate
                     ];
                }
            }
        ?>

        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Length', 'Description', 'Price', '') }}
        {{ Table::body($allActivated) }}
        {{ Table::close() }}

        @if(count($allDeactivated)>0)
            </br>
            <h2>Deactivated:</h2>
            {{ Table::hover_open(["class"=>'sortable']) }}
            {{ Table::headers( 'Name', 'Description', '') }}
            {{ Table::body($allDeactivated) }}
            {{ Table::close() }}
        @endif

    @endif
@stop
