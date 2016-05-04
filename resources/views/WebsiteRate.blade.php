<html>
    <head>
        <title>
           Create a Rating System for Your Website 
        </title>
        <link href="css/styles.css" rel="stylesheet"/>
    </head>
    <body>
         <div class="container">
            <div class="content">
           <form action="{{ URL::route('websiteindex') }}" method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(isset($Result))
            @foreach ($Result as $result_data)
            <br/>
          <?php   $result_data['Rating']=($result_data['rating_count']!=0)?$result_data['rating_total']/$result_data['rating_count']:0;
          $result_data['Rating']=  number_format( $result_data['Rating'], 1)
          ?>
              {{$result_data['title']."(". $result_data['Rating'].")"}} 
              <br/>
              <b> Rate::</b>
              @for($x=1;$x<=$limit;$x++)
              <a href="{{URL::route('rating',["item"=>$result_data['Id'],"rating"=>$x,"limit"=>$limit])}}">{{$x}}</a> 
              @endfor
           @endforeach
            @endif   
           </form>
            </div>
         </div></body>
</html>