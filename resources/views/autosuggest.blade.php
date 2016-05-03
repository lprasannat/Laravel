<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Auto suggest
        </title>
        <link href='css/style.css' rel="stylesheet"/>        
        <script type="text/javascript" src="js/jquery.js" /></script> 
    <script type="text/javascript" src="js/custom.js" /> </script> 


</head>
<body>
    <div class="container">
        <div class="content">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="text" class="autosuggest"/>
            <br/>

            <div class="dropdown">
                <ul class="result">

                </ul>
            </div>
            <input type="submit" value="search"/>    
        </div></div>
</body>