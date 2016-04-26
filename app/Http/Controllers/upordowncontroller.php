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

class upordowncontroller extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        return view('upordown');
    }

    public function upordown($url) {
        $cs = curl_init($url = null);
        curl_setopt($cs, CURLOPT_NOBODY, TRUE);
        curl_setopt($cs, CURLOPT_FOLLOWLOCATION, TRUE);
        $status_code = curl_getinfo($cs, CURLINFO_HTTP_CODE);
        return($status_code = 200) ? true : FALSE;
        
    }

    public function up() {
        $url = Input::get('url');
        //echo $url;
        if (isset($_POST['url']) == TRUE && empty($_POST['url']) == FALSE) {
            $url = trim($_POST['url']);            
            if (filter_var($url, FILTER_VALIDATE_URL) == true) {
                echo $url;
                $obj=new upordowncontroller();
                $obj->upordown($url);
               
                if ($obj == TRUE) {
                    echo 'Wensite url is up';
                } else {
                    echo 'sorry, Website url id down';
                }
            } else {
                echo 'Invalid Url';
            }
        }
        
    }

}
