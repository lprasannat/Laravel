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

}
