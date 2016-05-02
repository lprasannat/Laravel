<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class calculatorcontroller extends BaseController {

    public function index() {
        $calc = new calculatorcontroller();

        $calc->add(10);
        $calc->add(5);
        $calc->subtract(2);

        echo $calc->getTotal();
        
}

protected $total;

public function add($value) {
$this->total += $value;
}

public function subtract($value) {
$this->total -= $value;
}

public function getTotal() {
return $this->total;
}

}
