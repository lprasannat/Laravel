<html>
    <head>
        <title>
            Search
        </title>
        <link href='css/styles.css' rel="stylesheet"/>
         <link rel="stylesheet" href="css/search.css"/>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h2>Search</h2>
                <form action='{{URL::route('Searchengine')}}' method='post'>
                    <p>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type='text' name='keywords'/>
                        <input type='submit' value='search'>
                    </p>
                </form>
            </div></div>
    </body>
</html>
