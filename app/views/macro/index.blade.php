@extends('layouts.default')

@section('title')
    {{trans('general.providers')}}
@stop

@section('content')

    <?php 
        $macroService = MacroService::whereActive(0)->get();
        $categories = Categories::all();
        $categoryName['none'] = 'none';
        foreach ($categories as $cat)
        {
            $categoryName[$cat->name] = $cat->name;
        }        
    ?>

    @if(count($macroService)==0)
        {{ Typography::warning('No providers avaliable yet') }}
    @else
        {{ Form::open(['method'=>'GET']) }}
        {{ Form::label('category', 'Filter providers by category:') }}
        {{ Form::select('categories',$categoryName ,Input::get('category')) }}
        {{ Form::submit('Filter') }}
        {{ Form::close() }}
        {{ Form::open(['method' => 'GET']) }}
        {{ Form::label(Lang::get('general.search') . ':') }}
        {{ Form::text('search',Input::get('search')) }}
        {{ Form::submit(trans('general.search')) }}
        {{ Form::close() }}

        <?php 
        if (array_key_exists (strtr(Input::get('categories'), array("+" => " ")),$categoryName) && (strtr(Input::get('categories'), array("+" => " "))) != 'none')
        {
            $macroService = MacroService::where('name', strtr(Input::get('categories'), array("+" => " ")))->get();
        }
        else if(strtr(Input::get('search'), array("+" => " ")) != '')
        {
            $src = strtr(Input::get('search'), array("+" => " "));
            $macroService = MacroService::Where('name', 'like', '%'.$src.'%')->orWhere('city', 'like', '%'.$src.'%')->orWhere('title', 'like', '%'.$src.'%')->get();
        }
        else{
            $mic = MacroService::whereActive(0)->get();       
        }

            $tbody = []; 
            $i = 1; 
            foreach ($macroService as $service){    
                $tbody[] = [
                    'id'     => $i, 
                    'name'   => $service->name,
                    'title'  => $service->title,
                    'City'   => $service->city . '<br>' . $service->street, 
                    'Email'  => $service->email,
                    'link'   => Button::link(URL::route('macro.micro.index', $service->id),Lang::get('general.choose'))
                 ];
                 $i++;
            }
        ?>

        {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
        {{ Table::headers('#', Lang::get('general.name'),Lang::get('general.title'),Lang::get('general.city'), Lang::get('general.email'), '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    
    @endif
@stop
