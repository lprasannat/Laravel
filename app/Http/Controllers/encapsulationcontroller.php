<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class encapsulationcontroller extends BaseController {

    public function index() {
        $food = new classfilecontroller();
        $food->setProductType("Pizza");
        echo 'This item is ' . $food->type;
    }

    public $type;

    public function setProductType($value) {
        $this->type = $value;
    }

    public function getProductType() {
        return $this->type;
    }

}
