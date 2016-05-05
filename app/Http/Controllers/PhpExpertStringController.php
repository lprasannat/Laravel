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

class PhpExpertStringController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $string = "My Length";
        $length = strlen($string);
        return View('PhpExpertString', ['namelength' => $length]);
    }

    public function NameLength() {
        $string = "My name is Alex.";
        $lengthofname = strlen($string);
        $substring = mb_substr($string, 0, $lengthofname - 5);
        return View('SubStr', ['name' => $substring]);
    }

    public function explode() {
        $string = "1/2/3/4/5";
        $exparray = explode("/", $string);
        foreach ($exparray as $array)
            $array = $array . ' ';
        return View('Explode', ['explode' => $array]);
    }

    public function implode() {
        $string = "1/2/3/4/5";
        $exparray = explode("/", $string);
        $newstring = implode($exparray);
        return View('Implode', ['implode' => $newstring]);
    }

    public function join() {
        $string = "1/2/3/4/5";
        $exparray = explode("/", $string);
        $newstring = join($exparray, "/");
        return View('Join', ['join' => $newstring]);
    }

    public function substr_count() {
        $search = "My name is lakshmi. What is your name?";
        $result = substr_count($search, "lakshmi");
        return View('SubStrCount', ['substrcount' => $result]);
    }

    public function substr_replace() {
        $replace = "My name is Alex.";
        $result = substr_replace($replace, "lakshmi", 11, 15);
        return View('SubStrReplace', ['substrreplace' => $result]);
    }

    public function proxy() {
        $url = 'http://google.co.uk';
        $page = Input::File($url);
        echo $page;
        foreach ($page as $part) {
            $part = preg_replace('/src="/', 'src="' . $url, $part);
            $part = preg_replace('/action="/', 'action="' . $url, $part);
            echo $part;
        }
    }

    public function datetotime() {
        $offset = strtotime("+1 weeks 1 hours");
//        echo $offset;
        $date = date("d-m-y", $offset);
//        echo $date;
        $time = date("h:i:s", $offset);
        echo "The time is $time and the date is $date";

        echo '<hr>';

        $current_time = date("h:i:s");
        $goal_time = "04:45:00";

        echo "
    Current time: $current_time<br>
        Goal time: $goal_time<p>";

        echo "<meta http-equiv='refresh' content='1'>";

        if ($current_time >= $goal_time) {
            echo 'Goal has been reached';
        }
    }

    public function crawled() {
        $useragent = $_SERVER['HTTP_USER_AGENT'];
       // echo $useragent;
        if (stripos($useragent, "Firefox")) {
            echo "hai";
            $file = Input::File("crawled.txt", "a");
            fwrite($file, "You have been crawled\n");
        }
    }

}
