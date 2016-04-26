<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class adddecimalpointcontroller extends BaseController {

    public function index() {        
        
        $pi=pi();
        $pi_short=number_format($pi,3);
        
        return view('adddecimalpoint',['adddecimal'=>$pi_short]);
               
    }

    

}
