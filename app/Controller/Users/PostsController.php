<?php

namespace App\Controller\Users; 


class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('user');
    }

    public function index(){
        header('location: index.php');
    }
   
    public function home(){
        $login = $this->test();
        $user = $this->user->find(isset($_GET['id']));
        $users = $this->user->all();
        $this->render('users.posts.home', compact('login', 'user', 'users'));
    }


    

}