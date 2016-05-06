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

class SpellcheckerController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

   public function spellcheck() {
        return View('Spellchecker');
    }

    public function checkspelling() {

        $word = Input::get('word');
        $result = null;
        $result2 = null;
        $success = 0;
        $letter = substr($word, 0, 1);
        $spelling = DB::table('Spellchecker')->where("Word", "like", $letter . "%")->get();

        foreach ($spelling as $users1) {
            foreach ($users1 as $x => $users2) {

                similar_text($word, $users2, $percent);
                //echo $percent; exit;
                if ($percent > 70) {
                    $result.="<li>" . $users2 . "</li>";
                    echo $result;

                    if ($percent > 90) {
                        $success = 1;
                        $result2 = "<li>" . $users2 . "</li>";
                    }
                }
            }
            if ($success == 1) {
                echo $result;
            } else {
                echo $result2;
            }
        }
    }

}
