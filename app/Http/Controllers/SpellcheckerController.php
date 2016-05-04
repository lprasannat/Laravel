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

    public function index() {

        return view('Spellchecker');
    }

    public function check() {
        $input = Input::all();
      $word=$input['word'];
      echo $word;
        if (empty($word) === FALSE)
            $word = trim($word);
        $object = new SpellcheckerController();
        $result = $object->spellchecker($word);
        return View('Spellchecker', ['Result' => $result]);
    }

    public function spellchecker($word) {

        $sub_words = substr($word, 0, 1);

        $data = DB::table('Spellchecker')->select('Word')->where('Word', 'like', $sub_words . '%')->get();
     
        foreach ($data as $vas) {
            foreach ($vas as $x => $value) {
                if ($x == 'Word') { 
                   
                    similar_text($word, $value, $percent);
                    if ($percent > 80){
                        $output[] = $value;
                    }
                    
                }
            }
        }
        print_r (empty($output) ? false : $output);
    }

}
