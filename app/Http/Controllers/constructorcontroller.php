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

class constructorcontroller extends BaseController {

    public function index() {
        $book = new Product('book', 8.99);
        echo 'Type of product is ' . $book->getProductType() . ' and price is ' . $book->getProductPrice();
    }

}  
    class Product {

    protected $_type;
    protected $_price;

    public function __construct($type, $price) {
        $this->_type = $type;
        $this->_price = $price;
    }

    public function getProductType() {
        return $this->_type;
    }

    public function getProductPrice() {
        return $this->_price;
    }

}



