@extends('layouts.default')

@section('title')
    Service settings
@stop

@section('content')
    <form method="POST" action="" accept-charset="UTF-8">
    <label for="name">Service Name:</label>
    <input type="text" name="name" id="name">
    <label for="Email">E-mail:</label>
    <input type="text" name="email" id="email">
    <label for="language">Language:</label>
    <select>
    	<option value="English">English</option>
    	<option value="Slovenian">Slovenian</option>
    </select>
    <label for="Password">Change password:</label>
    <input type="password" name="password1" id="password1">
    <label for="Password">Re-type password:</label>
    <input type="password" name="password2" id="password2">
    </br>
    <input type="submit" value="Save settings">
</form>
@stop