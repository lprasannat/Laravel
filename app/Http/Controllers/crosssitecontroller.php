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
       
        return $_SESSION['_token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    public  function check($_token) {
        if (isset($_SESSION['_token']) && $token === $_SESSION['_token']) {
            echo $_SESSION['_token'];
            unset($_SESSION['_token']);
            return true;
        }
        return false;
    }

}
