@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    <?php 
            $duration[0]="15 min";
            $duration[1]="30 min";
            $duration[2]="45 min";
            $duration[3]="1 h";
            $duration[4]="1 h 15 min";
            $duration[5]="1h 30 min";
            $duration[6]="1h 45 min";
            $duration[7]="2 h";
    ?>  
    {{ Former::open('ManageServices') }}
    {{ Former::text('Name:')->autofocus() }}
    {{ Former::select('Length:')->options($duration, 1) }} 
    {{ Former::text('Description:') }}
    {{ Former::Number('Price:') }}
    {{ Former::actions()->submit('Add service') }}
    {{ Former::close() }}   

 <!--   <table>
        <tr>
            <td> Id </td>
            <td> Name </td>
            <td> Length </td>
            <td> Description </td>
            <td> Price </td>
        </tr>    -->
    <!--</table>-->
   
@stop

@foreach ($micservice as $service)
            <tr>
                <td> $service->id </td>
                <td> $service->name </td>
                <td> $service->length </td>
                <td> $service->description </td>
                <td> $service->price </td>
            </tr>
        @endforeach 