<?php

namespace App\Controller\Admin;

use \App;
use \App\Model\DBAuth;

class AppController extends \App\Controller\AppController{
	
	public function __construct(){
		parent::__construct();
		$app = App::getInstance();
		$auth = new DBAuth($app->getDb());
		if(!$auth->Administrateur()){
			$this->forbidden();
		}
	}

	public function views(){
		$fichier =  ROOT . '/app/stats/compteur' ;
		return file_get_contents($fichier);

	}

	public function views_year($annees){
		$fichier_year = ROOT . '/app/stats/compteur-' . $annees;
		$fichiers_year = glob($fichier_year);
		$totals = 0;
		foreach($fichiers_year as $fichier_year){
			$totals +=file_get_contents($fichier_year);
		}
		return $totals;
	}

	public function views_month($annees, $mois){
		$mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
		$fichier = ROOT . '/app/stats/compteur-' . $annees . '-' . $mois . '-' . '*';
		$fichiers = glob($fichier);
		$total = 0;
		foreach($fichiers as $fichier){
			$total +=file_get_contents($fichier);
		}
		return $total;
	}

	public function views_month_details($annees, $mois){
		$mois = str_pad((int)$mois, 2, '0', STR_PAD_LEFT);
		$fichier = ROOT . '/app/stats/compteur-' . $annees . '-' . (string)$mois . '-' . '*';
		$fichiers = glob($fichier);
		$visites = [];
		foreach($fichiers as $fichier){
			$parties = explode('-', basename($fichier));
			$visites[] = [
				'jour'=> $parties[3],
				'visites'=> file_get_contents($fichier)
			];
		}
	return $visites;
	}
}