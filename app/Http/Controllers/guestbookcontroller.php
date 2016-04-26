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

class guestbookcontroller extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        return view('guestbook');
    }

    public function guestbook() {
        echo "hai";
        $time = time();
        $errors = array();
//        $guestbook_name = Input::get('guestbook_name');
//        $guestbook_email = Input::get('guestbook_email');
//        $guestbook_message = Input::get('guestbook_message');
        if (isset($_POST['guestbook_name'], $_POST['guestbook_email'], $_POST['guestbook_message'])) {
            $guestbook_name = $_POST['guestbook_name'];
            //echo $guestbook_name;
            $guestbook_email = $_POST['guestbook_email'];
            $guestbook_message = $_POST['guestbook_message'];
            if (empty($guestbook_name) || empty($guestbook_email) || empty($guestbook_message)) {
                $errors[]= "all fields are required";
                
            }
            if (strlen($guestbook_name) > 45 || strlen($guestbook_email) > 255 || strlen($guestbook_message) > 255) {
                $errors[]= "one or more fileds exceeded ";
            }
            if(empty($errors)){
                $insert=DB::query("INSERT INTO entries VALUES('','$time','$guestbook_name','$guestbook_email','$guestbook_message')");
                if($insert){
                    echo 'hello';
                }
            }
        }
    }

}
