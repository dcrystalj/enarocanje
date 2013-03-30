@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    $durations = [15 min, 30 min, 45 min, 1 h, 1 h 15 min,1 h 30 min, 1 h 45 min, 2 h];
    
    {{ Former::open() }}
    {{ Former::text('Name:')->autofocus() }}
    {{ Former::text('Length:') }}
    <!-- {{ Former::select('duration')->options($durations, 8) }} -->
    {{ Former::password('Description:*') }}
    {{ Former::password('Price:*') }}
    {{ Former::four_text('* - Optional') }}
    {{ Former::actions()->submit('Add service') }}
    {{ Former::close() }}   
    <div>
        <form method="POST" action="" accept-charset="UTF-8">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="length">Length:</label>
        <select>
        	<option value="15">15 min</option>
        	<option value="30">30 min</option>
            <option value="45">45 min</option>
            <option value="1">1 h</option>
            <option value="1:30">1 h 30 min</option>
            <option value="2">2 h</option>
        </select>
        <label for="description">Description:*</label>
        <textarea for="description"></textarea>
        <label for="price">Price:*</label>
        <input type="text" name="price" id="price">

        <label for="optional">* - Optional</label>
        </br>
        <input type="submit" value="Add service">
        </form>
</div>
@stop