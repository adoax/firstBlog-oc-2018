<?php

namespace App\Controller\Admin;


class DashboardController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $login = $this->test();
        $items = $this->Category->all();     
        $annees = (int)date('Y');
        $this_annees = empty($_GET['annee']) ? null : (int)$_GET['annee'];
        $this_mois = empty($_GET['mois']) ? null : $_GET['mois'];
        $mois = [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Aout',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre'
        ]; 
        if ($this_annees && $this_mois){
            $views = $this->views_month($this_annees, $this_mois);
            $views_details = $this->views_month_details($this_annees, $this_mois);
        } elseif($this_annees) {
            $views = $this->views_year($this_annees);
        } else {
            $views = $this->views(); 
        }
        
        $this->render('admin.dashboard.index', compact('items', 'login', 'views', 'views_details', 'annees', 'this_annees', 'mois', 'this_mois'));
    }

}
?>
