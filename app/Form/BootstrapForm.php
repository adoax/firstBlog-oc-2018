<?php
namespace App\Form;

class BootstrapForm extends Form {

	protected function surround($html){
		return "<div class=\"form-group\" >{$html}</div>";
	}
	/**
	* @param $name string
	* @param $label
	* @param array $options
	* @return string
	*/
	public function input($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'textarea';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<textarea name="' . $name . '" class="form-control mytextarea" >' . $this->getValue($name) . ' </textarea>';
		}  
			return $this->surround($label . $input);
	}

	public function inputLogin($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<input type="' . $type .'" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control " autofocus minlength=2 required onkeyup="verif(this)">';
			
		} 	return $this->surround($label . $input);
	}
		public function addComment($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<input type="' . $type .'" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control " autofocus minlength=2 required>';

		} 	return $this->surround($label . $input);
	}

	public function ReportComment($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<input type="' . $type .'" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control " style="display:none">';
			
		} 	return $this->surround($label . $input);
	}


	public function changePassword($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<input type="' . $type .'" name="' . $name . '"  value=""  class="form-control" onkeydown="if(event.keyCode==32) return false ">';
			
		} 	return $this->surround($label . $input);
	}


    /**
     * @param $name
     * @param $label
     * @param $options
     * @return string
     */
    public function select($name, $label, $options){
		$label = '<label>' . $label . '</label>';
		$input = '<select class="form-control" name="' . $name . '">';
		foreach ($options as $k => $v) {
			$attributes ='';
			if($k == $this->getValue($name)){
				$attributes = 'selected';
			}
			$input .= "<option value='$k'$attributes>$v</option>";
		}
		$input .='</select>';
			return $this->surround($label . $input);
	}


	public function changedates($name, $label, $value){
		$type = isset($options['type']) ? $options['type'] : 'datetime';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<input type="datetime-local"   name="'. $name .'"  value="' . $value . '" class="form-control" >';
		}  
			return $this->surround($label . $input);
	}

	public function addDate($name, $label){
		$type = isset($options['type']) ? $options['type'] : 'datetime';
		$label = '<label>' . $label . '</label>';
		if($type){
			$input = '<input type="datetime-local"   name="'. $name .'"  value="" class="form-control" >';
		}  
			return $this->surround($label . $input);
	}

    /**
     * @param $name
     * @param $label
     * @return string
     */
    public function uploadImage($name, $label){
		$type = isset($options['type']) ? $options['type'] : 'file';
		$label = '<label for="file">' . $label . '</label>';
		if($type){
			$input = '</br><input  class="form-control " type="file" name="files" value="' . $this->getValue($name) . '" ><img class="card-img-top img-thumbnail " src="image/'. $this->getValue($name) .'" alt="Card image cap"><input type="hidden" value="' . $this->getValue($name) . '" >';
		}  
			return $this->surround($label . $input);
	}

	public function submit(){
		return $this->surround('<button type="submit" class="btn btn-primary">Envoye</button>');
	}
}