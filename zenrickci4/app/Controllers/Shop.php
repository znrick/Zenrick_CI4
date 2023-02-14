<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function index()
    {
        return view('shop');
    }
    public function product($type = 'laptop', $product_id = 'ASUS'){
        echo '<h2>This is a Product: '.$type.' with an id: '.$product_id.'</h2>';
        //return view('product');
    }
    // protected function adminCheck(){
    //     echo 'This is a Protected area.';
    // }
}
