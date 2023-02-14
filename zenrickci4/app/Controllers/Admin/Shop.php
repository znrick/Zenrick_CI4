<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
class Shop extends BaseController
{
    public function index()
    {
        echo '<h2>This is an Admin Shop Area</h2>';
    }
    public function product($type, $product_id){
        echo '<h2>This is an Admin Product </h2>';
        //return view('product');
    }
    // protected function adminCheck(){
    //     echo 'This is a Protected area.';
    // }
}
