@extends('layouts.default')

@section('title')
    Registration
@stop

@section('content')
    <form method="POST" action="http://localhost/app/controllers/ProviderRegistrationHandler.php" accept-charset="UTF-8">
    <label for="name">Service Name:</label>
    <input type="text" name="name" id="name">
    <label for="Email">E-mail:</label>
    <input type="text" name="email" id="email">
    </br>
    <input type="submit" value="Register">
</form>
@stop