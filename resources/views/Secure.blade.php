<html>
    <head>
        <title>
            Find and Replace
        </title>


        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body> 
        <div class="container">
            <div class="content">


                <form action="{{ URL::route('Secure') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p>
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                    </p>
                </form>

                </form>
            </div>
        </div>
    </body>
</html>