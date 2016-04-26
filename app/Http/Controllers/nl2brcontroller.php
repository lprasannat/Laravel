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

class nl2brcontroller extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        return view('nl2br');
       

    }
     public  function nl2br() {
         echo "ha";
         if (isset($_POST['text'])) {

            $new = nl2br(htmlentities($_POST['text']));
             echo $new;
            return view('nl2br', ['nl2br' => $new]);
        }
            
        }

}
