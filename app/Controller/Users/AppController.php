<?php

namespace App\Controller\Users; 

use \App;
use \App\Model\DBAuth;



class AppController extends \App\Controller\AppController{

	public function __construct(){
		parent::__construct();
		$app = App::getInstance();
		$auth = new DBAuth($app->getDb());
		if(!$auth->Utilisateur() && !$auth->Administrateur()){
			$this->forbidden();
		}
	}


}