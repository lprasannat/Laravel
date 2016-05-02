<html>
    <head>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Auto suggest
        </title>
       <link href='style.css' rel="stylesheet"/>
<!--        <link rel="stylesheet" href="css/search.css"/>-->
        <script type="text/javascript" src="jquery2.js" /></script> 
      <script type="text/javascript" src="custom.js" /> </script> 
      
        
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