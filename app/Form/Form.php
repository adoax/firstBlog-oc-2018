<?php

namespace  App\Form;

class Form{


	protected $data;
	public $surround = 'p';
	
	
	public function __construct($data = array()){
		$this->data = $data;
	}

	protected function surround($html){
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}

	protected function getValue($index) {
		if(is_object($this->data)){
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}


	/**
	* @return string
	*/

	public function submit(){
		return $this->surround('<button type="submit">Send</button>');
	}




}