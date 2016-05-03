<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class crosssitecontroller extends BaseController {

    public function index() {
        Session::regenerate();
        return view('crosssite');
    }

    public function cross() {
        //echo "hai";
        $quantity = Input::get('quantity');
        $product = Input::get('product');

        if (isset($_POST['quantity'], $_POST['product'])) {
            //echo $quantity;
            if (!empty($product) && ($quantity)) {
                
                if (crosssitecontroller::check($_POST['_token'])) {
                    echo "process order";
                }
            }
        }
    }

    public  function generate() {
       
        return Session::put('_token') = base64_encode(openssl_random_pseudo_bytes(32));
    }

    public  function check($_token) {
        echo "hai";
        if (Session::has('_token') && $token ===Session::get('_token')) {

            unset(Session::get('_token'));
            return true;
        }
        return false;
    }

}
