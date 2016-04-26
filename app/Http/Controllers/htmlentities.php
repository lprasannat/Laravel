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

class htmlentities extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {

        $from_db = '<script>alert("hello")</script>';
        $sanitised = htmlentities($from_db);
        //echo $sanitised;

        return view('htmlentities',['htmlentity'=>$sanitised]);
    }

}
