<?php

namespace App\Controller;

use  App\Form\BootstrapForm;


class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('User');
        $this->loadModel('Comment');
    }

    public function index(){
        $login = $this->test();
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $dateDefault = date_default_timezone_set('Europe/Paris');
        $datePost = date('Y-m-d H:i:s');
        $this->render('posts.index', compact('posts', 'categories', 'login', 'datePost', 'dateDefault'));
    }

    public function logout(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.logout', compact('posts', 'categories'));
    }

    public function category(){
        $login = $this->test();
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $dateDefault = date_default_timezone_set('Europe/Paris');
        $datePost = date('Y-m-d H:i:s');        
        $this->render('posts.category', compact('articles', 'categories', 'categorie', 'login','dateDefault', 'datePost'));
    }

    public function show(){
        
        if (!empty($_POST)) {
            if ($_SESSION['users']){
            $result = $this->Comment->create([
                'auteur' => $_POST['auteur'] = $_SESSION['users'],
                'commentaire' => $_POST['commentaire'],
                'id_billet' => $_POST['id_billet'] = $_GET['id'],
                'id_user' => $_POST['id_user'] = $_SESSION['usersid'],
            ]); }else {
                $result = $this->Comment->create([
                'auteur' => $_POST['auteur'] = $_SESSION['auth'],
                'commentaire' => $_POST['commentaire'],
                'id_billet' => $_POST['id_billet'] = $_GET['id'],
                'id_user' => $_POST['id_user'] = $_SESSION['authid']
                ]);
            }
            header('location: index.php?p=posts.show&id=' . $_GET['id'] );
           
        } 
        $getArticle = $this->Post->find($_GET['id']);
        if($getArticle === false){
            $this->notFound();
        }    
        $add_views = $this->add_views();
        $login = $this->test();
        $article = $this->Post->findWithCategory($_GET['id']);
        $timeset = $this->Post->timeForShow($_GET['id']);
        $comments = $this->Post->getComment($_GET['id']);
        $form = new BootstrapForm($_POST);
        $forms = new BootstrapForm($comments);        
        $this->render('posts.show', compact('article', 'timeset', 'login', 'add_views', 'comments', 'result', 'form', 'forms'));
    }

    public function editComment(){
        $Comment = $this->Comment->find($_GET['id']);
        if (!empty($_POST)) {
            if (isset($_SESSION['users']) || isset($_SESSION['auth'])){
            $result = $this->Comment->update($_GET['id'], [
                'commentaire' => $_POST['commentaire']               
                    ]);}                  
                    header("location: index.php?p=posts.show&id=" . $Comment->id_billet);
                } 
                
        $login = $this->test();
        $Comment = $this->Comment->find($_GET['id']);
        $form = new BootstrapForm($Comment);
        $this->render('posts.editComment', compact('login', 'Comment',  'result', 'form'));
    }


    public function signalement(){
        if (!empty($_POST)) {
            if (isset($_SESSION['users']) || isset($_SESSION['auth'])){
            $result = $this->Comment->update($_GET['id'], [
                'moderation' => $_POST['moderation'] = 1
                    ]);}                   
                 } 
        $login = $this->test();
        $Comment = $this->Comment->find($_GET['id']);
        $form = new BootstrapForm($Comment);
        $this->render('posts.signalement', compact('login', 'Comment',  'result', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
           
        }
        header("location:".  $_SERVER['HTTP_REFERER']); 
    }

    public function CGU(){
        $login = $this->test();
        $this->render('posts.CGU', compact('login'));
    }
}

