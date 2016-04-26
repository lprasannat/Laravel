<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/style.css" >
        <script type="text/javascript" src="assets/custom.js"></script>
<!--        <style>
            body{
                font:1em verdana;
            }
            .autosuggest,.dropdown,.result{
                margin:0;
                padding:0;
                border:0;
                width:250px;
            }
            .autosuggest{
                padding:4px;
                border:1px solid #000;
            }
            .result{
                width:250px;
                list-style: none;
            }
            .result li{
                border-top:0;
                padding:5px;
                border:1px solid #000;
                cursor:pointer;
            }
            .result li:hover{
                background:#000;
                color:#fff;
            }
        </style>-->
        <script>


$(document).ready(function () {
    $('.autosuggest').keyup(function () {
        var searchitem = $(this).val();
        $.post('ajax/search.php', {searchitem: searchitem}, function (data) {
            $('.result').html(data);
            $('.result li').click(function () {
                var resultvalue = $(this).text();
                $('.autosuggest').val(resultvalue);
                $('.result').html('');
            });
        });

    });
});

        </script>

    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{URL::route('autosuggest')}}" method="post">
                    <input type="text" class="autosuggest"><input type="submit" value="search">
                    <div class="dropdown">
                        <ul class="result">

                        </ul>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </body>
</html>
