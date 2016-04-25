<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use File;

class hitcontroler extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        $filename = "counter.txt";

        $currentvalue = (File::exists($filename)) ? File::get($filename) : 0;
        File::put('counter.txt', ++$currentvalue);
        return view('boot', ['currentvalue' => $currentvalue]);
    }

    public function multiplefile() {
      
            $files = $_FILES['upload'];
            for ($x = 0; $x < count($files['name']); $x++) {
                $name = $files['name'][$x];
                $tmp_name = $files['tmp_name'][$x];
                move_uploaded_file($tmp_name, 'upload/' . $name);
            }
            return view('multiple');
//print_r(count($files));
        }
    }



?>
