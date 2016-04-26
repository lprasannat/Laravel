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

class maxlength extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {

        $input = Input::get('name');
        $max_len = 10;
        if (strlen($input) > $max_len) {
            return view('maxlength', ['maxlength' =>'sorry too long']);
            //echo 'sorry too long';
        } else {
            return view('maxlength', ['maxlength' =>'ok']);
            //echo 'ok';
        }

        
    }

}
