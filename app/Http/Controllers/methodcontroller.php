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

class methodcontroller extends BaseController {

    public function index() {
        $book = new Book(8.99);
        echo '$' . $book->calculateProductVAT();
    }

}

class Product {

    protected $_price;

    public function calculateProductVAT() {
        return $this->_price * 0.20;
    }

}

final class Book extends Product {

    public function __construct($price) {
        $this->_price = $price;
    }

}
