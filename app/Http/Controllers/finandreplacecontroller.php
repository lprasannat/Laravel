<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\usertables;
use Mail;
use Illuminate\Support\Facades\Input;
use File;

class finandreplacecontroller extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        return view('findandreplace');
    }

    public function index() {
        $find = Input::get('find');
        //echo $find;
        $replace = Input::get('replace');
        $text = Input::get('text');

        if (isset($_POST['find'], $_POST['replace'], $_POST['text']) === true) {
           
                $find = explode(',', $_POST['find']);
                //array_walk($find, 'addDelimiter');
            
            $replace = (empty($_POST['replace']) == false) ? explode(',', $_POST['replace']) : '';
            $text = (empty($find) === false && empty($replace) === false)? str_replace($find, $replace, $_POST['text']) : $_POST['text'];
        echo $text;
           // return view('findandreplace',['findvalue'=>$text]);
        }
    }

//    function addDelimiter(&$in) {
//        $in = '/' . trim($in) . '/';
//    }

}
