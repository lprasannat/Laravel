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
use DB;

class SearchengineController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        return view('Searchengine');
    }

    public function search() {
        $suffix = "";
        $object = new SearchengineController();

        $keywords = Input::get('keywords');
//        echo $keywords;
        $errors = array();
        if (empty($keywords)) {
            $errors[] = 'Please enter a search term';
        } else
        if (strlen($keywords) < 3) {
            $errors[] = 'Your search term must be three or more characters';
        } else
        if ($object->search_results($keywords) === false) {
            $errors[] = 'Your search for ' . $keywords . ' returned no results';
        }
//        print_r($errors);
        if (empty($errors)) {
            $results = $object->search_results($keywords);
            
            $results_num = count($results);

            $suffix = ($results_num != 1) ? 's' : '';

            echo '<p>Your search for <strong>' . $keywords . '</strong> returned <strong>' . $results_num . '</strong> result' . $suffix . '</p>';

            foreach ($results as $result) {
                echo '<p><strong>' . $result['title'] . '</strong> <br>' . $result['description'] . '... <br> <a href="' . $result['url'] . '" target="_blank">' . $result['url'] . '<a>';
            }
        } else {
            foreach ($errors as $error) {
                echo $error . '</br>';
            }
        }
    }

    function search_results($keywords) {
//        echo "hai";
        $returned_results = array();
        $where = "";

        $keywords = preg_split('/[\s]+/', $keywords);
        $total_keywords = count($keywords);

        foreach ($keywords as $key => $keyword) {
            $where .="`keywords` LIKE '%$keyword%'";

            if ($key != ($total_keywords - 1)) {
                $where .= " AND ";
            }
        }
        $results = DB::SELECT(DB::RAW("SELECT `title`,LEFT(`description`,70) as `description`,`url` FROM `articles` WHERE $where"));
        //print_r($results);
     $results = json_decode(json_encode($results), true);
        $results_num = ($results) ? count($results) : 0;
        //echo $results_num;
        if ($results_num === 0) {
            return false;
        } else
            foreach($results as $resultsrow) {
                $returned_results[] = array('title' => $resultsrow['title'],
                    'description' => $resultsrow['description'],
                    'url' => $resultsrow['url']
                );
            }
        return $returned_results;
    }

}
