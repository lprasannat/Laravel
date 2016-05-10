<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Like -- Button
        </title>
        <script type="text/javascript" src="/js/jquery.js" />  </script> 
    <script type="text/javascript" src="/js/like.js" /> </script> 
<link href="/css/LikeStyles.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="content">
            <form action="{{ URL::route('LikeButton') }}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="view">
                    @if(isset($Result))
                    @foreach ($Result as $result_data)
                    <ul>


                        <li><p> {{$result_data['Article_Title']}}</p><p> <a href="#" class="like" onClick="like_add({{$result_data['Article_Id']}})">Like</a> <span id="article_{{$result_data['Article_Id']}}_likes">{{ $result_data['Article_Likes']}}</span> Like this</p></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <span id="danger">
                </span>
            </form>

        </div>
    </div>
</body>
</html>
