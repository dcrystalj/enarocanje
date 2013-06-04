@extends('layouts.default')

@section('title')
    {{trans('general.services')}}
@stop

@section('content')

    <?php
        $perPage = 100; 
        $mic = MicroService::with('macroservice')->paginate($perPage);
        $filter = Service::gender();

    ?>

    @if(count($mic)==0)
        {{ Typography::warning(trans('messages.noServicesYet')) }}
    @else

        <?php
        ///////////////// NIMA VEZE ///////////////
        if (array_key_exists (Input::get('gender'),Service::gender()) && 
            (Input::get('gender') != 'U') && 
            strtr(Input::get('search'), array("+" => " ")) == '')
        
        {
            $cond = 1;   
        }
        else if(strtr(Input::get('search'), array("+" => " ")) != '' && (Input::get('gender') != 'U'))
        {
            $cond = 2;
        }
        else if(strtr(Input::get('search'), array("+" => " ")) != '' && (Input::get('gender') == 'U'))
        {
           $cond = 3;
        }
        else{
            $cond = 4;
        }
        /////////////////
        ?>

        {{ Former::open()->method('GET') }}
        {{ Former::select('gender',trans('messages.filterByGender').':')->options($filter)->value(Input::get('gender')) }}
        {{ Former::text('search',trans('general.search'). ':')->value(Input::get('search')) }}
        <div class="controls">
        {{ Former::submit(trans('general.filter')) }}
        </div>
        {{ Former::close() }}

        <?php
        if ($cond == 1)
        {
            $mic = MicroService::with('macroservice')->where(function($query){
                $query->where('gender', Input::get('gender'))
                      ->orWhere('gender','U');
            })->paginate($perPage);    
        }
        else if($cond == 2)
        {
            $src = strtr(Input::get('search'), array("+" => " "));
            $gen = Input::get('gender');
            $mic = MicroService::with('macroservice')->where('gender',$gen)->where(function($query) use ($src){
                $query->where('name', 'like', '%'.$src.'%');
            })
            ->orWhere(function($query) use ($src){
                $query->where('title', 'like', '%'.$src.'%');    
            })->paginate($perPage);
        }
        else if($cond == 3)
        {
            $src = strtr(Input::get('search'), array("+" => " "));
            $mic = MicroService::with('macroservice')->where(function($query) use ($src)
            {
                $query->where('title', 'like', '%'.$src.'%')->orWhere('name', 'like', '%'.$src.'%'); 
            })->paginate($perPage);
        }

        if ($mic){ 
        $tbody = []; 
        $i = 1; 
        $length = 0;
        foreach ($mic as $service){
            if($service->isActive())
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

                $mac = $service->macroservice->id;
                $tbody[] = [
                //'id'     => $i, 
                'name'   => $service->name,
                'title'  => $service->title,
                'length' => $length, 
                'desc'   => strlen($service->description)>15 ? substr($service->description,0,20) .'...' : $service->description, 
                'price'  => $service->price, 
                'link'   => Button::link(URL::route('macro.micro.reservation.index',[$mac,$service->id]),trans('general.reservate'))
                ];
                $i++;
            }
        }
        }?>

        @if(count($tbody)>0)
        {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
        {{ Table::headers( trans('general.name'),trans('general.title'), trans('general.length'), trans('general.description'), trans('general.price').'(€)', '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
            @if($cond < 4)
            {{ $mic->appends(['search' => Input::get('search'), 'gender' => Input::get('gender')])->links() }}
            @else
            {{ $mic->links() }}
            @endif
        @else
        {{ Typography::warning(trans('messages.noServicesForFilter')) }}
        @endif
    @endif
   
@stop
