<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class MultipleController extends BaseController {

    public function index() {
        return view('multiple');
    }

    public function multipleFile() {        
        $input = Input::file('upload');
        $message=count($input);
        $success="";
        for ($x = 0; $x < count($input); $x++) {
            //echo $name;
            $input[$x]->move("Upload", $input[$x]->getClientOriginalName());
        }
        $success= 'Successfully '.$message.' files are uploaded';
        return view('multiple',['multiplefile_value'=>$success]);
    }
}