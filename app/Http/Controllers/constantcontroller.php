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

class constantcontroller extends BaseController {

    public function index() {
        $Book = new Book(8.99);
        echo 'VAT is ' . $Book->calculatorProductVAT();
    }

}

class Product {

    const VAT = 0.20;

    protected $_price;

    public function calculatorProductVAT() {
        return $this->_price * VAT;
    }

}

class Book extends Product {

    public function __construct($price) {
        $this->_price = $price;
    }

    public function calculatorProductVAT() {
        return $this->_price * self::VAT;
    }

}
