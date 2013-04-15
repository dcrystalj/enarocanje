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

        $services['Manicure'] = 'Manicure';
        $services['Pedicure'] = 'Pedicure';
        $services['Depilation'] = 'Depilation';
        $services['Solarium'] = 'Solarium';
        $services['Make-up'] = 'Make-up';
        $services['Massage'] = 'Massage';
        $services['Hair services'] = 'Hair services';
        $services['Solarium'] = 'Solarium';
        $services['Skin treatments'] = 'Skin treatments';

        $sex[0] = 'M';
        $sex[1] = 'W';
        $sex[2] = 'unisex';

    ?>
    
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
        {{ Former::select('name','Service:')->options($services)->autofocus() }}
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
                if($service->active==0&& $service->activefrom <= date("Y-m-d") || 
                $service->active==-1 && $service->activefrom > date("Y-m-d"))
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
                        'deactivate'  => deactivate($mac->id, $service->id),

                     ];
                     $i++;
                }
                else{

                    $allDeactivated[] = [
                        'name'        => $service->name, 
                        'description' => $service->description, 
                        'link1'       => activate($mac->id, $service->id)
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
    function deactivate($macId,$micId)
    {
        $deactivate =    Form::open(array('method' => 'DELETE', 
                                        'url' => URL::route('macro.micro.destroy',[$macId,$micId]),
                                        'class'    => 'deactivate'));
        $deactivate .=    Form::hidden('date','',['id'=>'hiddendate']);
        $deactivate .=    Form::submit('Deactivate');
        $deactivate .=    Form::close();
        return $deactivate;
    }
    function activate($macId,$micId)
    {
        $activate = Form::open(array('method' => 'GET', 
                                    'url'    => URL::route('microactivate',[$macId,$micId]),
                                    'class'    => 'activate'));
        $activate .=    Form::hidden('date','',['id'=>'hiddendate']);
        $activate .=    Form::submit('Activate');
        $activate .=    Form::close();
        return $activate;
    }

    ?>

    <div id="event-dialog" class="modal hide fade">
        <!-- dialog contents -->
        <div class="modal-body">
          <span id="spanfrom">From:</span> <input type="date" value="{{ date('Y-m-d',strtotime('now')) }}" id="efrom" /><br />
        </div>
          <!-- dialog buttons -->
        <div class="modal-footer">
            <a href="#" class="b_cancel btn">Cancel</a>
            <a href="#" class="b_save btn btn-success">Submit</a>
        </div>
    </div>
@stop
