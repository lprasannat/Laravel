@extends('layout.main')
@section('content')
<form action='{{URL::route('accounts-create-post')}}' method='post'>
    <div class='field'>
        Email:<input type='text' name='email'>
        </div>
    <div class='field'>
        UserName:<input type='text' name='username'>        
    </div>
    <div class='field'>
        password:<input type='password' name='password'>
    </div>
    <div class='field'>
        password_again:<input type='password' name='password-again'>
    </div>
    <input type='submit' value='submit'>
    {!!csrf_field()!!}
</form>
@stop