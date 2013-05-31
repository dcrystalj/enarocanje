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
        {{ Former::open()->method('GET') }}
        {{ Former::select('categories',trans('general.filterProvidersByCategory'). ':')->options($categoryName)->value(Input::get('categories')) }}
        {{ Former::text('search',trans('general.search'). ':')->value(Input::get('search')) }}
        <div class="controls">
        {{ Former::submit(trans('general.filter')) }}
        </div> 
        {{ Former::close() }}

        <?php 
        if (array_key_exists (strtr(Input::get('categories'), array("+" => " ")),$categoryName) && (strtr(Input::get('categories'), array("+" => " "))) != 'none' &&
            strtr(Input::get('search'), array("+" => " ")) == '')
        {
            $macroService = MacroService::where('name', strtr(Input::get('categories'), array("+" => " ")))->get();
        }
        else if(strtr(Input::get('search'), array("+" => " ")) != '' && (strtr(Input::get('categories'), array("+" => " "))) == 'none')
        {
            $src = strtr(Input::get('search'), array("+" => " "));
            $macroService = MacroService::Where(function($query) use ($src)
                {
                    $query->where('name', 'like', '%'.$src.'%')
                          ->orWhere('city', 'like', '%'.$src.'%')
                          ->orWhere('title', 'like', '%'.$src.'%');
                })->get();
        }
        else if(strtr(Input::get('search'), array("+" => " ")) != '' && (strtr(Input::get('categories'), array("+" => " "))) != 'none')
        {
            $src = strtr(Input::get('search'), array("+" => " "));
            $macroService = MacroService::where('name',strtr(Input::get('categories'), array("+" => " ")))->where(function($query) use ($src)
                {
                    $query->where('name', 'like', '%'.$src.'%')
                          ->orWhere('city', 'like', '%'.$src.'%')
                          ->orWhere('title', 'like', '%'.$src.'%');
                })->get();
        }
        else{
            $mic = MacroService::whereActive(0)->get();       
        }

            $tbody = []; 
            $i = 1; 
            foreach ($macroService as $service){  
                $tbody[] = [ 
                    'logo'   => UserLibrary::getImageWithSize($service->logo,'200px','100px','rel="lightbox"'),   
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
        {{ Table::headers(trans('general.logo'), Lang::get('general.name'),Lang::get('general.title'),Lang::get('general.city'), Lang::get('general.email'), '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    
    @endif
@stop
