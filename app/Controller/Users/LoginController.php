<?php
namespace App\Controller\Users; 

use App\Model\DBAuth;
use App\Form\BootstrapForm;
use \App;

class LoginController extends \App\Controller\AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('user');
	}

	public function login(){
		$login = $this->test();
		$errors = false;
		if(!empty($_POST)){
			$auth = new DBAuth(App::getInstance()->getDb());
			if($auth->adminLogin($_POST['username'], $_POST['password'], isset($_POST['role']))){
				header('location: index.php?p=admin.dashboard.index');
			}	elseif ($auth->usersLogin($_POST['username'], $_POST['password'], isset($_POST['role']))) {
				header('location: index.php?p=users.posts.index');
			}
			else {
				$errors = true;
				}
			}
		$form = new BootstrapForm($_POST);
		$this->render('users.login.login', compact('form', 'errors', 'login'));
	}	


	public function register(){
		$login = $this->test();
		$succes = false;
		$errors = false;
		$errorss = false;
		$errorPseudo = false;
		$users = $this->user->all();
		$errorEmail = false;
		$auth = new DBAuth(App::getInstance()->getDb());
		if (!empty($_POST)) {
			if($auth->verifyPseudo(($_POST['username'])) !== true){
				if($auth->verifyEmail(($_POST['email'])) !== true){
					if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])){
						if($_POST['password'] == $_POST['cpassword']){
							$hashpassword = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT, ["cost" => 12] );
							$result = $this->user->create([
							'username' => strip_tags($_POST['username']),
							'email' => strip_tags($_POST['email']),
							'password' => $hashpassword
							]);		
								$succes = true;
						} elseif($_POST['password'] != $_POST['cpassword']) {
							$errorss = true;
							}
					} 	else {
						$errors = true;
						}	
				} 	else {
					$errorEmail = true;
					}	
			}	else {
					$errorPseudo = true;
					} 	
	}	
		$form = new BootstrapForm($_POST);
		$this->render('users.login.register', compact('form', 'login', 'succes', 'errorss', 'errors', 'errorPseudo', 'errorEmail'));
	
	}
}