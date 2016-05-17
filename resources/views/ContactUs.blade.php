@extends('Layout')
@section('content')
<h1>Contact Us.</h1>
<p>Please contact us by sending a message using the form below:</p>
<form method='post' action="{{URL::route('Contact')}}">
    <div class='row col-md-6'>
        @if(isset($msg))
        {{$msg}}
        @endif
        <div class=' col-md-offset-2'>
            <label>Subject</label><br>
            <input type='text' name='subject'class='form-control'><br>

            <label>Message</label><br>
            <textarea rows="8" cols='30' class='form-control' name="message"></textarea><br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type='submit' name='submit' value='submit' class="btn-success">
        </div>
        
    </div>
</form>

@stop