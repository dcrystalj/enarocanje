@extends('layouts.default')

@section('title')
    {{trans('general.addNewProviderCategory')}}
@stop

@section('content')

        {{ Former::open(URL::route('category.store'))->rules($rules) }}
        {{ Former::text('name',trans('general.categoryName')+':')->autofocus() }}
        {{ Former::actions()->submit({{trans('general.addNewCategory')}}) }}
        {{ Former::close() }} 


        <?php
            $categories = []; 
            $i = 1; 
            $category = Categories::all();
            foreach ($category as $cat){   
                $categories[]= [
                    'id'     => $i, 
                    'name'   => $cat->name,
                    'link'   => Button::link(
                                    URL::route('category.servicecat.create',
                                        $cat->id), 'Add service category'),
                ];
                $i++;
            }
        ?>

         @if(count($categories)>0)
            </br>
            <h2>{{trans('general.categoryName')}}:</h2>
            {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
            {{ Table::headers('#', {{trans('general.categoryName')}},'') }}
            {{ Table::body($categories) }}
            {{ Table::close() }}
        @endif

@stop
