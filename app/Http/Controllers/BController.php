<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\usertables;
use Mail;

class BController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        //return 'home';
        //echo $user= usertables::find(2)->name;
        // echo "<pre>", print_r($user);
        return view('home');
//        Mail::send('email.test', array("name" => "lakshmi"), function($message) {
//            $message->to('lprasanna537@gmail.com', 'lakshmi')->subject('testemail');
//        });
    }

//    public function exists(){
//        return view('boot');
//    }
//    public function root(){
//        return view('pages/about');
//    }
//    
//
    public function secure() {
        $errors = array();
        $allowedextension = array('jpg', 'jpeg', 'png', 'gif');
        $FileName = $_FILES['image']['name'];
        $FileExtension = strtolower(end(explode('.', $FileName)));
        $FileSize = $_FILES['image']['size'];
        $File_tmp = $_FILES['image']['tmp_name'];
        if (in_array($FileExtension, $allowedextension) == false) {

            $errors[] = "extension not allowed";
        }
        if ($FileSize > 209152) {
            $errors[] = "file size must be under 2mb";
        }
        if (empty($errors)) {
            if (move_uploaded_file($File_tmp, 'images/' . $FileName)) {
                echo "file uploaded";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }

}
