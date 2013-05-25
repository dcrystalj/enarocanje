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
        $tbody = []; 
        $i = 1; 
        $imageHeight = 100;
        $imageWidth = 200;
        $biggerSide = $imageWidth;
        $path = Auth::user()->logo;
        $image = File::get($path);
        echo $path;
        echo Html::image($path,'alt text');
        if ($imageHeight > $imageWidth)
        {
            $logoPlaceholder = '<a href="boxxy.jpg" rel="lightbox" title="my caption"><img src="boxxy.jpg" height="' . $imageHeight . '" width="auto" style="height:none"></a>';
        }
        else 
        {
            $logoPlaceholder = '<a href="boxxy.jpg" rel="lightbox" title="my caption"><img src="boxxy.jpg" height="auto" width="' . $imageWidth . '" style="height:none"></a>';
        }
        foreach ($macroService as $service){    
            $tbody[] = [
                'id'     => $i,
                'neki'   => $logoPlaceholder,    
                'name'   => $service->name,
                'City'   => $service->city . ' <br>' . $service->street, 
                'Email'  => $service->email,
                'link'   => Button::link(URL::route('macro.micro.index', $service->id),trans('general.choose'))
             ];
             $i++;
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
                    'id'     => $i, 
                    'neki'   => $logoPlaceholder,   
                    'name'   => $service->name,
                    'City'   => $service->city . '<br>' . $service->street, 
                    'Email'  => $service->email,
                    'link'   => Button::link(URL::route('macro.micro.index', $service->id),Lang::get('general.choose'))
                 ];
                 $i++;
            }
        ?>

        {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
        {{ Table::headers('#','placeholder', Lang::get('general.name'),Lang::get('general.city'), Lang::get('general.email'), '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    
    @endif
@stop
