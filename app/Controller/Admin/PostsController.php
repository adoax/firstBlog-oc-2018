<?php

namespace App\Controller\Admin;

use  App\Form\BootstrapForm;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Category');
		$this->loadModel('Comment');
	}

	public function index(){
		$login = $this->test();
		$posts = $this->Post->all();
		$this->render('admin.posts.index', compact('posts', 'login'));
	}

	public function add(){
		
		require ROOT . '/app/Controller/Admin/UploadController.php';
		$fileUpload = new File();

		if (!empty($_POST)) {
			$result = $this->Post->create([
				'titre' => strip_tags($_POST['titre']),
				'contenu' => $_POST['contenu'],
				'category_id' => $_POST['category_id'],
				'datetime'=> $_POST['datetime'],
				'file'=> $_FILES['files']['name'],
                'textAlt' => $_POST['textAlt']
			]);
			if($result){
				$fileUpload->uploadFile($_FILES['files']);
				return $this->index();
			}
		}
		$login = $this->test();
		$categories = $this->Category->extract('id', 'titre');
		$form = new BootstrapForm($_POST);
		$article = $this->Post->all();
		$this->render('admin.posts.add', compact('categories', 'form', 'article', 'login'));
	}

	public function edit(){
		require ROOT . '/app/Controller/Admin/UploadController.php';
		$fileUpload = new File();
		$post = $this->Post->find($_GET['id']);
		$login = $this->test();
		if (!empty($_POST)) {
			if(!empty($_FILES['files']['name'])){
			$result = $this->Post->update($_GET['id'], [
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'category_id' => $_POST['category_id'],
				'datetime'=> $_POST['datetime'],
				'file'=> $_FILES['files']['name'],
                'textAlt' => $_POST['textAlt']
			]);} else {
				$result = $this->Post->update($_GET['id'], [
					'titre' => $_POST['titre'],
					'contenu' => $_POST['contenu'],
					'category_id' => $_POST['category_id'],
					'datetime'=> $_POST['datetime'],
					'file'=> $post->file,
                    'textAlt' => $_POST['textAlt']
				]);
			}
			if($result ){
				$fileUpload->uploadFile($_FILES['files']);
			}
		}
		$login = $this->test();
		$post = $this->Post->find($_GET['id']);
		$categories = $this->Category->extract('id', 'titre');
		$form = new BootstrapForm($post);
		$article = $this->Post->findWithCategory($_GET['id']);
		$this->render('admin.posts.edit', compact('categories', 'form', 'post', 'article', 'login'));

	}

	public function delete(){
		if (!empty($_POST)) {
			$result = $this->Post->delete($_POST['id']);
			return $this->index();
		}

	}


	public function listComment(){
        $login = $this->test();
		$posts = $this->Post->editAdminComment();
        $this->render('admin.posts.listComment', compact('login', 'posts'));
	}
	
	public function confirmComment(){
        if (!empty($_POST)) {
            if (isset($_SESSION['users']) || isset($_SESSION['auth'])){
            $result = $this->Comment->update($_GET['id'], [
                'moderation' => $_POST['moderation'] = 2
                    ]);}                   
                 } 
        $login = $this->test();
        $Comment = $this->Comment->find($_GET['id']);
        $form = new BootstrapForm($Comment);
        $this->render('admin.posts.confirmComment', compact('login', 'Comment',  'result', 'form'));
    }

}
