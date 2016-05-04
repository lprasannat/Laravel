
<!Doctype Html>
<html>
    <head>
        <title>First template</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <style>
            #register
            {
                margin-top: 40px;
            }
        </style>

    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <nav class="nav navbar-default navbar-fixed-top">
            <div class="nav container-fluid">
                <div class="navbar-header">
                    <a href="" class="navbar-brand">My Apps</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="">Home</a></li>

                        <li><a href="">About us</a></li>

                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="">Go Back</a></li></ul>
                </div>

            </div>
        </nav>

        <div class="container margintop" id="register">

            <form class="form-horizontal" action="{{ URL::route('submit')}}" method="post">
                <h1><u>Registration Page</u></h1>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <label for="fname" class="control-label col-md-2">First Name*:</label>
                    <div class="col-md-6">
                        <input type="text" title="Your First name" class="form-control" id="fname" name="firstname" placeholder="First Name" required></div>
                    <span id="fnamelocation"></span>

                </div>
                <div class="form-group">
                    <label for="lname" title="Your Last Nmae" class="control-label col-md-2">Last Name*:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="lname" name="lastname" placeholder="Last Name" required></div>
                    <span id="lnamelocation"></span>

                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Email Address*:</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="email" class="form-control" id="email" name="email" title="Your Email" placeholder="your Email" required></div>
                    </div>
                    <span id="emaillocation"></span>
                </div>
                <div class="form-group">
                    <label for="pwd" class="control-label col-md-2">Password*:</label>
                    <div class="col-md-6">
                        <input type="password" title="Your Password" class="form-control" name="password" id="pwd" placeholder="Enter password" required></div>
                    <span id="pwdlocation"></span>
                </div>
                <div class="form-group">
                    <label for="cpwd" class="control-label col-md-2">Conform Password*:</label>
                    <div class="col-md-6">
                        <input type="password" title="type same password from above field" name="conformpassword" class="form-control" id="cpwd" placeholder="Retype password" required></div>
                    <span id="cpwdlocation"></span>
                </div>


                <div class="form-group">
                    <label for="phone" class="control-label col-md-2">Phone Number*:</label>
                    <div class="col-md-6">
                        <input type="tel" class="form-control" id="phone" name="phone" title="Your Phone Number" placeholder="your Phone Number" maxlength="10" required></div>
                    <span id="phonelocation"></span>
                </div>

                <input type="submit" class="btn btn-success" name='register' value='submit'>
            </form>


        </div>
    </body>
</html>