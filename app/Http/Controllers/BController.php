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
    public function index() {

        return view('secure');
    }

    public function uploadFiles() {

        $input = input::file('file');
        $error = array();
        $allowed = array('jpg', 'jpeg', 'gif', 'png');
        $file_name = $input->getClientOriginalName();
        @$file_ext = strtolower(end(explode('.', $file_name)));
        $file_size = $input->getClientSize();
        if (in_array($file_ext, $allowed) === FALSE) {
            $error[] = 'extension not allowed';
        }
        if ($file_size > 2097152) {
            $error[] = 'file size should be less than 2 mb';
        }
        if (empty($error)) {
            $input->move("Uploads", $input->getClientOriginalName());
            $error[] = "successfully uploaded";
        }
 return View('secure', ['Secure_value' => $error]);
    }

}
