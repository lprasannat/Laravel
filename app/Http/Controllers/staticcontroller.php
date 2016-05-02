<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\AuthManager;
use Prologue\Alerts\AlertsMessageBag;

class staticcontroller extends BaseController {

    public function index() {
        $counter = new Count();        
        $counter->increment();
        echo $counter->getCount();
        
    }

}

class Count {

    protected static $_count;

    public function getCount() {
        return self::$_count;
    }

    public static function increment() {
        self::$_count++;
    }

}
