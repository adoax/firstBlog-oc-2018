<?php

namespace App\Controller\Admin;

use App\Form\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $login = $this->test();
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items', 'login'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $login = $this->test();
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form', 'login'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $login = $this->test();
        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form', 'login'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}