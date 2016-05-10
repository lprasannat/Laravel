<?php
namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\FileLoader;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LikeController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        // return view('Like');
        $object = new LikeController();
        $limit = 6;
        session()->regenerate();
        session(['User_Id' => 1]);
        $article = $object->get_articles($limit);

        if (count($article) == 0) {
            echo "sorry no articles found";
        } else {


            return View('Like', ['Result' => $article, 'limit' => $limit]);
        }
    }

    public function get_articles($limit) {


        $limit = (int) $limit;
        $article = array();
        $data = DB::table('articlelike')->select('Article_Id', 'Article_Title', 'Article_Likes')->take($limit)->get();

        $content = json_decode(json_encode($data), true);

        return $content;
    }

    public function like_add() {
        session()->regenerate();
            $object = new LikeController();
        $input = Input::get('Article_Id');
        if ($object->article_exists($input)) {
//            $article_id = $input;
            if ($object->previously_liked($input)) {
                echo 'You have liked this';
            } else {
                $object->add_likes($input);
                echo 'success';
            }
        }
       
    }

    public function like_get() {
        session()->regenerate();
            $object = new LikeController();
        $input = Input::get('Article_Id');
       if($object->article_exists($input)) {
    $count=$object->like_count($_POST['Article_Id']);
    $count=json_decode(json_encode($count), true);
    foreach ($count as $value) {
     echo $value['Article_Likes'];   
    }
    
}
    }

    function article_exists($article_id) {
    $article_id = (int) $article_id;
      return DB::table('articlelike')->where('Article_Id',$article_id)->count('Article_Id');
    //return (mysql_result(mysql_query("SELECT COUNT(`article_id`) FROM articles WHERE `article_id`= $article_id"), 0) == 0 ? false : true);
}

    function previously_liked($article_id) {
        $article_id = (int) $article_id;
        // return (mysql_result(mysql_query("SELECT COUNT(`like_id`) FROM likes WHERE  `user_id` = ".$_SESSION['user_id']." AND `article_id` = $article_id"), 0) == 0 ? false : true);
        return DB::table('likes')->where('Article_Id', $article_id)->count('Like_Id');
    }

    function like_count($article_id) {
        $article_id = (int) $article_id;
        return DB::table('articlelike')->select('Article_Likes')->where('Article_Id', $article_id)->get();
        //return mysql_result(mysql_query("SELECT `article_likes` FROM artickes  WHERE  `article_id` = $article_id"), 0, 'article_likes');
    }

//

    function add_likes($article_id) {
        $article_id = (int) $article_id;
//    mysql_query("UPDATE `articles` SET `article_likes` = `article_likes`+1  WHERE  `article_id` = $article_id");
//    mysql_query("INSERT INTO `likes`(`user_id`, `article_id`) VALUES (" . $_SESSION['user_id'] . ", $article_id) ");

        DB::table('articlelike')->where('Article_Id', $article_id)->update(['Article_Likes' => 'Article_Likes' + 1]);
        DB::table('likes')->insert(['User_Id' => session()->get('User_Id'), 'Article_Id' => $article_id]);
    }

}