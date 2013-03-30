@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
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