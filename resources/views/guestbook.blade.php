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
                <form action="{{URL::route('guestbook')}}" method="post">

                    <strong>Post something...</strong><br>
                    Name:<br><input type="text" name="guestbook_name" maxlength="45"><br>
                    Email:<br><input type="email" name="guestbook_email" maxlength="255"><br>
                    Message:<br><textarea name="guestbook_message"rows="8" cols="50" maxlength="255"></textarea><br>
                    <input type="submit" value="submit">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
        </div>
    </body>
</html>
