<?php

namespace App\Controller;


use \App;

class AppController extends Controller{

    protected  $template = 'default';

    public function __construct(){
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getModel($model_name);
    }

    public function test(){
        if(isset($_SESSION['auth'])||isset($_SESSION['users'])){
            return true;
		} else {
            return false;
        }
    }

    public function add_views(){
		$fichier = ROOT . '/app/Controller/stats/compteur' ;
        $fichier_mensuel = $fichier . '-' . date('Y-m-d');
        $fichier_annuel = $fichier . '-' . date('Y');
        $this->incremente_compteur($fichier);
        $this->incremente_compteur($fichier_annuel);
        $this->incremente_compteur($fichier_mensuel);
    }
    
    public function incremente_compteur($fichier){
        $compteur = 1;
		if (file_exists($fichier)) {
			$compteur = file_get_contents($fichier);
			$compteur++;
		}
		file_put_contents($fichier, $compteur);

    }

    

}