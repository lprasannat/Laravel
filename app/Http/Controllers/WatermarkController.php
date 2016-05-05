<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\FileLoader;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WatermarkController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        return view('Watermark');
    }

    public function home() {
        $object = new WatermarkController();
        $input = Input::file('upload');
        $tmp_name = Input::File('tmp_name');
        if ($object->allowed_image($input) == true) {
            $input = md5(microtime(true)) . '.png';
            //echo $input;
            $water = $object->watermark_image($input, 'upload' . $input);
            echo $water;
        }
        //return View('Watermark', ['water' => $file_name]);
    }

    public function allowed_image($input) {
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $input->getClientOriginalName();
        // echo $file_name;
        @$file_ext = end(explode('.', $file_name));
//echo $file_ext;
        return (in_array($file_ext, $allowed_ext) ? true : FALSE);
    }

    public function watermark_image($input, $destination) {
        echo "hai";
        $watermark = imagecreatefrompng('images/watermark.png');

        $source = getimagesize($input);
        echo $source;
        $source_mime = $source['mime'];

        if ($source_mime == 'image/png') {
            $image = imagecreatefrompng($input);
        } else
        if ($source_mime == 'image/jpeg') {
            $image = imagecreatefromjpeg($input);
        } else
        if ($source_mime == 'image/gif') {
            $image = imagecreatefromgif($input);
        }

        imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
        imagepng($image, $destination);
    }

}
