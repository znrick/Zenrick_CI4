<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
class Users extends BaseController
{
    public function index()
    {
        echo '<h2>This is User Area</h2>';
    }
    public function getAllUsers(){
        echo '<h2>Show all Users </h2>';
        //return view('product');
    }
    // protected function adminCheck(){
    //     echo 'This is a Protected area.';
    // }
}
