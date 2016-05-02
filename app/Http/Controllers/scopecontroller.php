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

class scopecontroller extends BaseController {

    public function index() {
        $book = new Book('Children', 8.99, '123456798');
        echo "product type is". $book->getProductType()."<br>";
        echo  "product price is".$book->getProductPrice()."<br>";
        echo "product isbn is". $book->getProductIsbn()."<br>";
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

class Book extends Product {

    protected $_isbn;

    public function __construct($type, $price, $isbn) {
        parent::__construct($type, $price);
        $this->_isbn = $isbn;
    }

    public function getProductIsbn() {
        return $this->_isbn;
    }

}
