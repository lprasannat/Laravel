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
        return view('crosssite');
    }

    public function cross() {
        //echo "hai";
        $quantity = Input::get('quantity');
        $product = Input::get('product');

        if (isset($_POST['quantity'], $_POST['product'])) {
            //echo $quantity;
            if (!empty($product) && ($quantity)) {
                if (Token::check($_POST['token'])) {
                    echo "process order";
                }
            }
        }
    }

    public static function generate() {
        return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    public static function check($token) {
        if (isset($_SESSION['token']) && $token === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }
        return false;
    }

}
