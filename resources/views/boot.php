<!DOCTYPE html>
<html lang="en">
    <head>
        <title>bootstrap</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script type="text/javascript" src="jquery.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style type="text/css">
            #full-screen-background-image {
                z-index: -999;
                min-height: 100%;
                min-width: 1024px;
                width: 100%;
                height: auto;
                position: fixed;
                top: 0;
                left: 0;
                display: block;

            }
            h3{
                font-size:50px;
                font-weight:bold;
                color:red;
                text-align:center;
                text-decoration:underline;
            }
            span
            {
                color: red;
            }



        </style>

        <script type="text/javascript" src="myscript.js">

        </script>
    </head>
    <body data-spy='scroll' data-target=".navbar-collapse" >

        <img alt="full screen background image" src="image2.jpg" id="full-screen-background-image"  class="img-responsive"/>
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
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">home</a></li>
                    <li><a href="">contact Us</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">help</a></li>
                </ul>                
            </div>
        </nav>


        <div class="container" style="display:block">
            <div class="page-header">

                <h3>Registration form</h3></div>
            <div class="row">
                <div class=" col-md-6 col-md-offset-3">

                    <form role="form">

                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="firstname" id="fname" placeholder="enter ur  name"  class='form-control'>
                            <span id="firstspan"></span>
                        </div>
                        <div class="form-group">
                            <label for="lastname">LastName</label>
                            <input type="text" name="lastname" id="lname" placeholder="enter ur  name"  class='form-control'>
                            <span id="lastspan"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="mail" placeholder="enter ur email"  class='form-control'>
                            <span id="emailspan"></span>
                        </div>

                        <div class="form-group">
                            <label for="phonenumber">PhoneNumber</label>
                            <input type="text" name="phonenumber" id="phoneno" placeholder="enter ur phone number" class='form-control'>
                            <span id="phonespan"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobilenumber">MobileNumber</label>
                            <input type="text" name="mobilenumber" id="mobileno" placeholder="enter urmobile number"  class='form-control'>
                            <span id="mobilespan"></span>
                        </div>
                        <div  class='form-group'>
                            <label for='DOB'>DateOfBirth</label>
                            <input type="date" name="DOB" class='form-control' id="date1">
                        </div>
                        <div class = "form-group">
                            <label for = "inputfile">File input</label>
                            <input type = "file" id = "inputfile">
                        </div>



                        <div class="form-group">
                            <label for="select1">SelectStates</label>
                            <select class="form-control" id="select1" name="select1">
                                <option value="Telangana" selected="selected">Telangana</option>
                                <option value="AndhraPradesh">AndhraPradesh</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Maharastra">Maharastra</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="checks">Favourite Sports</label>
                            <div class="checkbox">
                                <label><input type="checkbox"  name="sport" id="check1" value="cricket">Cricket</label>
                                <label><input type="checkbox"  name="sport" id="check2" value="tennis">Tennis</label>
                                <label><input type="checkbox"  name="sport" id="check3"  value="football">Football</label>
                                <label><input type="checkbox"  name="sport" id="check4" value="kabbadi">Kabbadi</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rads">Languages</label>
                            <div class="radio">
                                <label><input type="radio" value="english" name="language" id="lang1">English</label>
                                <label><input type="radio" value="telugu" name="language" id="lang2">Telugu</label>
                                <label><input type="radio" value="hindi" name="language" id="lang3">Hindi</label>
                                <label><input type="radio" value="marati" name="language" id="lang4">Marati</label>
                                <label><input type="radio" value="other" name="language" id="lang5">Others</label>
                                <input type="text" id="mytext" name="lang" style="display: none" ><br><br>
                                <!-- <span id="text"></span><br>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text" >Description</label>
                            <textarea class="form-control" rows="5" id="text1"></textarea>
                            <span id="textspan"></span>
                        </div>


                        <input type="button" value="submit" class="btn btn-success margin"  data-toggle="modal"    id="close1" data-target="#mybutton2">

                        <div class="modal" id="mybutton2">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">My modal!</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="result" style="display:none">


                                        </div>  
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal">close</button>
                                        <button class="btn btn-success">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <div id="result" style="display:none">


                    </div>  





                </div>
            </div>




    </body>

</html>