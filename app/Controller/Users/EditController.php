<?php

namespace App\Controller\Users; 

use App\Model\DBAuth;
use  App\Form\BootstrapForm;
use \App;

class EditController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('user');
    }


	public function edition(){
		$auth = new DBAuth(App::getInstance()->getDb());
        $login = $this->test();
		if (!empty($_POST)) {
			if($auth->verifyPseudo(($_POST['username'])) !== true || $auth->verifyEmail(($_POST['email'])) !== true){
				
			if(!empty($_POST['username']) && !empty($_POST['email'])){
					$result = $this->user->update($_GET['id'], [
					'username' => strip_tags($_POST['username']),
					'email' => strip_tags($_POST['email']),
					]);
					
				   }
				   $_SESSION['users'] = $_POST['username'];
				   header('location: index.php?p=users.posts.home');
			} else {
				echo 'Pseudo ou email deja utilisé';
			}	
		
	}		
		$user = $this->user->find($_GET['id']);
		$form = new BootstrapForm($user);
		$this->render('users.edit.edition', compact('form', 'login','user'));
	}

	public function changePass(){
		$login = $this->test();
		if (!empty($_POST)) {
			if(!empty($_POST['password'])){
                if($_POST['password'] == $_POST['cpassword']){
					$hashpassword = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT, ["cost" => 12] );
					$result = $this->user->update($_GET['id'], [
					'password' => $hashpassword		
					]);
                   } 
                }header('location: index.php?p=users.posts.home');	
			}		
		$user = $this->user->find($_GET['id']);
		$form = new BootstrapForm($user);
		$this->render('users.edit.changePass', compact('form', 'login','user'));
	}


    

}