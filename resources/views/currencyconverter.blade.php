<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{URL::route('currencyconverter')}}" method="post">
                    <input type="text" name="amount"/><br>
                    <input type="text" name="from"/><br>
                    <input type="text" name="to"/><br>                    
                    <input type="submit" name="convert"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                @if(isset($currency_value))
                    
                     <strong style="color:black;"> {{ $currency_value}}</strong>
                  
                    @endif</p>
            </div>
        </div>
    </body>
</html>
