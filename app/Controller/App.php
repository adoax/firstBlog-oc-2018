<?php
use App\Controller\Config;
use App\Model\Database\Database;

class App{

	private static $title = "Blog écrivain";
	private static $metaDesc = "Découvre ici une liste de livres en ligne de tout genre.";
	private $db_instance;

	private static $_instance;

	public static function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new App();
		}

		return self::$_instance;

	}

	public static function getTitle(){
		return self::$title;
	}

	public static function setTitle($title){
		self::$_instance = new App();
		self::$title = $title;
	}

	public static function getMeta(){
	    return self::$metaDesc;
    }

    public static function setMeta($metaDesc){
	    self::$_instance = new App();
	    self::$metaDesc = $metaDesc;
    }


	public static function load(){
		session_start();
		require ROOT  . '/app/Autoloader.php';
		App\Autoloader::register();
	}

	public  function getModel($name){
		$class_name = '\\App\\Model\\' . ucfirst($name) . 'Model';
		return new $class_name($this->getDb());
	}

	public function getDb(){
		if(is_null($this->db_instance)){
		$this->db_instance = new Database();
		}
			return $this->db_instance;
	}


	


}

