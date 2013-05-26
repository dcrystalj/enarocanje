@extends('layouts.default')

@section('title')
    Add new provider category
@stop

@section('content')

        {{ Former::open(URL::route('category.store'))->rules($rules) }}
        {{ Former::text('name','Category name:')->autofocus() }}
        {{ Former::actions()->submit('Add new category') }}
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
            <h2>Categories:</h2>
            {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
            {{ Table::headers('#', 'Category name','') }}
            {{ Table::body($categories) }}
            {{ Table::close() }}
        @endif

@stop
