<html>
    <head>
        <title>
            Spell Checker
        </title>
        <link href='css/styles.css' rel="stylesheet"/>
         <link rel="stylesheet" href="css/search.css"/>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{ URL::route('Spellchecker') }}" method="post">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="text" name='word'/><br/>
        <br/>
     
        <div class="dropdown">
            <ul class="result">
                
                    @if(isset($_POST['Result']))
                    @foreach($Result as $word)
                    <li>
                    {{$word}}
                     </li>
                    @endforeach
                    @endif
               
            </ul>
        </div>
        <input type="submit" value='check'/>
        </form>
            </div></div>
    </body>
</html>
