
@extends('layout.main')
@section('content')


<form action='{{URL::route('accounts-create-post')}}' method='post'>
    <div class='field'>
        Email:<input type='text' name="email"{{ old('email') ? ' value="' . e(old('email')) . '"' : '' }}>
        @if($errors->has('email'))
        {{$errors->first('email')}}
        @endif
        </div>
    <div class='field'>
        UserName:<input type='text' name='username'{{ old('username') ? ' value="' . e(old('username')) . '"' : '' }}> 
        @if($errors->has('username'))
        {{$errors->first('username')}}
        @endif
    </div>
    <div class='field'>
        password:<input type='password' name='password'>
        @if($errors->has('password'))
        {{$errors->first('password')}}
        @endif
    </div>
    <div class='field'>
        password_again:<input type='password' name='password-again'>
         @if($errors->has('password-again'))
        {{$errors->first('password-again')}}
        @endif
    </div>
    <input type='submit' value='submit'>
    {!!csrf_field()!!}
</form>
@stop