@extends('layouts.default')

@section('title')
    {{trans('general.providers')}}
@stop

@section('content')
    <script src="js/lightbox/js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox/js/lightbox.js"></script>
    <link href="js/lightbox/css/lightbox.css" rel="stylesheet" />

    <?php 
        $macroService = MacroService::whereActive(0)->get();
        $categories = Categories::all();
        $categoryName['none'] = trans('general.none');
        foreach ($categories as $cat)
        {
            $categoryName[$cat->name] = $cat->name;
	}
    ?>

    @if(count($macroService)==0)
        {{ Typography::warning(trans('messages.noProvidersYet')) }}
    @else
        {{ Form::open(['method'=>'GET']) }}
        {{ Form::label(trans('general.filterProvidersByCategory')) }}
        {{ Form::select(trans('general.categories'),$categoryName ,Input::get('category')) }}
        {{ Form::submit(trans('general.filter')) }}
        {{ Form::close() }}

        <?php 
        if (array_key_exists (strtr(Input::get('categories'), array("+" => " ")),$categoryName) && (strtr(Input::get('categories'), array("+" => " "))) != 'none')
        {
            $macroService = MacroService::where('name', strtr(Input::get('categories'), array("+" => " ")))->get();
        }
        else{
            $mic = MacroService::whereActive(0)->get();       
        }

            $tbody = []; 
            $i = 1; 
            foreach ($macroService as $service){  
                $tbody[] = [
                    //'id'     => $i, 
                    'logo'   => UserLibrary::getImageWithSize($service->logo,'200px','100px','rel="lightbox"'),   
                    'name'   => $service->name,
                    'City'   => $service->city . '<br>' . $service->street, 
                    'Email'  => $service->email,
                    'link'   => Button::link(URL::route('macro.micro.index', $service->id),Lang::get('general.choose'))
                 ];
                 $i++;
            }
        ?>

        {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
        {{ Table::headers(trans('general.logo'), Lang::get('general.name'),Lang::get('general.city'), Lang::get('general.email'), '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    
    @endif
@stop
