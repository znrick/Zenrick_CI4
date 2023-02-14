<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
class CustomModel{


    protected $db;

    public function __construct(ConnectionInterface &$db){
      $this->db =  & $db;
    }
      function all(){
        //get all data in the current mysqldatabase

        return $this->db->table('posts')->get()->getResult();

      
    }
    function where(){
        //get all data in the current mysqldatabase

      return   $this->db->table('posts')
                        ->where(['post_id > '=> 90])
                        ->where(['post_id < '=> 95])
                        ->where(['post_id != '=> 91])
                        ->orderBy('post_id', 'ACS')
                        ->get()
                        ->getRow();

      
    }

    function join(){
      

     return  $this->db->table('posts')
                      ->where('post_id > ', 50)
                      ->where('post_id < ', 60)
                      ->join('users', 'posts.post_author = users.user_id')
                      ->get()
                      ->getResult();

    
  }

  function like(){
    

   return  $this->db->table('posts')
                    ->like('post_content', 'new', 'both')
                    ->join('users', 'posts.post_author = users.user_id')
                    ->get()
                    ->getResult();

  
}

function grouping(){
    

  return  $this->db->table('posts')
                    ->groupStart()
                      ->where(['post_id >' => '25', 'post_created_at < ' => '1984-06-24 10:27:26'])
                   
                    ->groupend()
                   ->orWhere('post_author', 10)
                   ->join('users', 'posts.post_author = users.user_id')
                   ->get()
                   ->getResult();

 
}
function wherein(){
    
$emails = ['adella56@example.com', 'shields.savanna@example.org', 'janiya.wehner@example.com' ];
  return  $this->db->table('posts')
                    ->groupStart()
                      ->where(['post_id >' => '25', 'post_created_at < ' => '1984-06-24 10:27:26'])
                   
                    ->groupend()
                   ->orWhereIn('email', $emails)
                   ->join('users', 'posts.post_author = users.user_id')
                   ->limit(5, 4)
                   ->get()
                   ->getResult();

 
}
    function getPosts(){
        $builder= $this->db->table('posts');
        $builder-> join('users', 'posts.post_author = users.user_id');
        $posts = $builder->get()->getResult();
        return $posts;
    }
    function getUsers($limit = false){
      $builder= $this->db->table('users');
      if($limit)
        $builder->limit($limit);
      $posts = $builder->get()->getResult();
      return $posts;
    }
    function getAnotherUsers($limit = false){
      
      $builder= $this->db->table('users');
      if($limit)
        $builder->limit($limit);
      $posts = $builder->get()->getResult();
      return $posts;
    }
}