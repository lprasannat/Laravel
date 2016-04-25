<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class autosuggestcontroller extends BaseController {

//    public function index() {
//        return view('autosuggest');
//    }

    public function auto() {
        echo "hai";
        if (isset($_POST['searchitem']) == true && empty($_POST['searchitem']) == false) {
            $searchitem = mysqli_real_escape_string( $_POST['searchitem']);
            //$query = "SELECT city FROM  structure WHERE city LIKE '$searchitem%'";
            echo $searchitem;
           $query=DB::table('structure')->get();
           $results = DB::select("SELECT * FROM structure WHERE city LIKE'$query%");
            $result = DB::query($results);
            while (($row = mysqli_fetch_assoc($result)) != false) {
                echo "<li>", $row['city'] . "</li>";
            }
            
        }
        return view('autosuggest');
    }

}
