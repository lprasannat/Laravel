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

class inheritancecontroller extends BaseController {

    public function index() {
        $book = new Book('children');
        $book->setProductIsbn('123456789');

        echo 'This ' . $book->getProductType() . ' book has isbn ' . $book->getProductIsbn();
    }

}

class Product {

    protected $_type;

    public function getProductType() {
        return $this->_type;
    }

}

class Book extends Product {

    protected $_isbn;

    public function __construct($type) {
        $this->_type = $type;
    }

    public function setProductIsbn($isbn) {
        $this->_isbn = $isbn;
    }

    public function getProductIsbn() {
        return $this->_isbn;
    }

}
