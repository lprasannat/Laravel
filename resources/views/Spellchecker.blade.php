<!Doctype Html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SpellChecker</title>
          <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/spellchecker.js"></script>
      
    </head>
    <body>
        <div class="container-fluid margintop">
            <div class="col-md-5 col-md-offset-3 text">
                Spelling Check:* <input type="text" class="form-control" id="word" >
                <ul id="list" class="result"></ul>
            </div>
        </div>
    </body>
</html>