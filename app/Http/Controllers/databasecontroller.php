<?php

namespace App\Http\Controllers;

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
use DB;

class databasecontroller extends BaseController {

    public function index() {
        $db = DB::table('article')->select('id', 'title')->get();
        //print_r($db);
        if (count($db) == 0) {
            echo 'No articles';
        } else {
            foreach (rows() as $article) {
                echo $article['id'] . ' - ' . $article['title'] . '<br>';
            }
            echo '<p>' . $db->count() . ' articles</p>';
        }
    }

    

    public function rows() {
        $rows = array();
        for ($x = 0; $x < $this->count(); $x++) {
            $rows[] = mysql_fetch_assoc($this->_result);
        }
        return $rows;
    }

}
