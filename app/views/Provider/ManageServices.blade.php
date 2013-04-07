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

            $MicroService = Microservice::All();
    ?>  
    {{ Former::open('ManageServices') }}
    {{ Former::text('name','Name:')->autofocus() }}
    {{ Former::select('length','Length:')->options($duration, 1) }} 
    {{ Former::text('description','Description:') }}
    {{ Former::Number('price','Price:') }}
    {{ Former::actions()->submit('Add service') }}
    {{ Former::close() }}   

    <table>
        <tr>
            <td> Id </td>
            <td> Name </td>
            <td> Length </td>
            <td> Description </td>
            <td> Price </td>
            <td> </td>
        </tr>
        @foreach ($MicroService as $service)
            <tr>
                <td> <?php echo $service->id ?> </td>
                <td> <?php echo $service->name ?> </td>
                <td> <?php echo $service->length ?> </td>
                <td> <?php echo $service->description ?> </td>
                <td> <?php echo $service->price ?> </td>
                <td> <a href="">Edit</a> <a href="">Delete</a> </td>
            </tr>
        @endforeach     
    </table>
   
@stop
