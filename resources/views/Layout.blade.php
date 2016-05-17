<html>
    <head>
        <meta charset="UTF-8">
        <title>WEBSITE DEVELOPMENT</title>



        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/WebsiteStyles.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class ="navbar-brand" href="#"> Karmanya Software</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/home">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contactus">services</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <div class="bottom-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 navbar-brand">
                        <a href="/">Learning Laravel</a>
                    </div>
                    <div class="col-md-10">
                        <ul class="bottom-links">
                            <li><a href="/home">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contactus">Contact</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>

