<?php

namespace App\Model;


use App\Model\Database\Database;

class DBAuth {

	private $db;

	public function __construct(Database $db){
		$this->db = $db;
	}


	public function getUserId(){
		if($this->Administrateur()){
			return $_SESSION['auth'];
		}
		return false;
	}

	/**
	* @param $username
	* @param $password
	* @return boolean
	*/

	public function adminLogin($username, $password, $role){
		$user = $this->db->prepare('SELECT * FROM users WHERE  username = ? AND  role = "admin" ', [$username],  null, true);
		if($user){
			if(password_verify($password, $user->password)){
			$_SESSION['auth'] = $user->username;
			$_SESSION['authid'] = $user->id;
			return true;
			}
		}
		return false;
	}

	public function usersLogin($username, $password, $role){
		$user = $this->db->prepare('SELECT * FROM users WHERE  username = ? AND role = "users" ', [$username], null, true);
		if($user){
			if(password_verify($password, $user->password)){
			$_SESSION['users'] = $user->username;
			$_SESSION['usersid'] = $user->id;
			return true;
			}
		}
		return false;
	}

	public function verifyPseudo($username){
		$user = $this->db->prepare('SELECT * FROM users WHERE  username = ?  ', [$username]);
		if(!empty($_POST['username']) == $user ){
			return true;
		}	
		return false;
	}
	
	public function verifyEmail($username){
		$user = $this->db->prepare('SELECT * FROM users WHERE  email = ?  ', [$username]);
		if(!empty($_POST['email']) == $user){
			return true;
		}	
		return false;
	}
	


	public function Administrateur(){
		return  isset($_SESSION['auth']);
	}

	public function Utilisateur(){
		return  isset($_SESSION['users']);
	}

}

