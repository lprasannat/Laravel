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
use DB;

class LikeButtonController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $obj = new LikeButtonController();
        $obj->init();
        return view('LikeButton');
    }

    public function init() {
        session::regenerate();
        $_SESSION['User_Id'] = 1;
        $articles = array();
        $query = DB::table('articlelike')->select('Article_Id', 'Article_Title', 'Article_Likes')->get();
        $query = (json_decode(json_encode($query), true));
        foreach ($query as $value) {
            foreach ($value as $values) {
                $articles[] = array(
                    'Article_Id' => $values['Article_Id'],
                    'Article_Title' => $values['Article_Title'],
                    'Article_Likes' => $values['Article_Likes']
                );
            }
            print_r($articles);
        }

//        while (($row = count($query)) !== false) {
//            $articles[] = array(
//                'Article_Id' => $row['Article_Id'],
//                'Article_Title' => $row['Article_Title'],
//                'Article_Likes' => $row['Article_Likes']
//            );
//            print_r($articles);
//            break;
//        }
    }

}
