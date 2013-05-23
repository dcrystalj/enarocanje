@extends('layouts.default')

@section('title')
    Add new service category
@stop

@section('content')
        <?php
            $providerCat = Categories::find($procat);
        ?>

        @if(isset($providerCat))
            <h3> {{ $providerCat->name }} </h3>
        @endif
        {{ Former::open(URL::route('category.servicecat.store',$procat))->rules($rules) }}
        {{ Former::text('name','Category name:')->autofocus() }}
        {{ Former::actions()->submit('Add new category') }}
        {{ Former::close() }} 


        <?php
            $categories = []; 
            $i = 1; 
            $category = ServiceCategories::where('providercat_id',$procat)->get();
            foreach ($category as $cat){   
                $categories[]= [
                    'id'     => $i, 
                    'name'   => $cat->name,
                ];
                $i++;
            }
        ?>

         @if(count($categories)>0)
            </br>
            <h2>Categories:</h2>
            {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
            {{ Table::headers('#', 'Category name','') }}
            {{ Table::body($categories) }}
            {{ Table::close() }}
        @endif

@stop
