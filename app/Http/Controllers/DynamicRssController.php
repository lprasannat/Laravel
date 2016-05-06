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
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
class DynamicRssController extends Controller {
    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;
    public function index() {
        $limit = (Input::get('limit') === true && IInput::get('limit') <= 30 && Input::get('limit') != 0) ? Input::get('limit') : 10;
//        echo $limit;
        $query = DB::table('DynamicRss')->select('Id', 'Title', 'TimeStamp')->orderBy('TimeStamp', 'desc')->get();
        
        if (count($query))
            return View('DynamicRss',['dynamic'=>'Title']);
        else
            return 'Problem executing query';
    }

}
