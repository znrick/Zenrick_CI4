<?php namespace App\Controllers;
 

use App\Models\CustomModel;

class Dbs extends BaseController
{
    public function index()
    {
        $db1= db_connect();
        $model = new CustomModel($db1);

        $db2= db_connect('anotherDb');
        $model2 = new CustomModel($db2);

        echo '<pre>';
        print_r($model->getUsers(5));
        echo '<pre><hr>';

        echo '<pre>';
        print_r($model->getAnotherUsers(5));
        echo '<pre><hr>';

        echo '<pre>';
        print_r($model->getUsers(5));
        echo '<pre><hr>';
        
      


      
        
    }
 
}
