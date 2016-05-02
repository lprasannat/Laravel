<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
use DateTime;

class guestbookcontroller extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {

        return View('guestbook');
    }

    public function guest() {
        $Input = Input::all();
        $DateTime=  new DateTime();
        $Time=$DateTime->format('Y-m-d H:i:s');
        $Name = htmlentities($Input['name']);
        $Email = htmlentities($Input['email']);
        $Message = htmlentities($Input['message']);
        if (empty($Name) && empty($Email) && empty($Message)) {
            $Error[] = "All fields are required";
        }
        if (strlen($Name) > 25 || strlen($Email) > 80 || strlen($Message) > 200) {
            $Error[] = "one or more fields exceed their limit";
        }
        if (empty($Error)) {
            DB::table('entries')->insert(
                   ['timestamp' => $Time, 'name' => $Name,'email'=>$Email,'message'=>$Message]
          );
           $Error[]="Successfully posted";
        }
        else{
              $Error[]="something went Wrong";
        }
        
        $Users = DB::table('entries')->select('name', 'email','message','timestamp')->where('email',$Email)->get();   
        return View('guestbook', ['Guest_error' => $Error,'Guest_user'=>$Users]); 
    }

}