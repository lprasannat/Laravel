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

                <form action="{{URL::route('water')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    Choose an image
                    <input type="file" name="upload">
                    <input type="submit" value="Watermark">
                </form>
                
            </div>
        </div>
    </body>
</html>