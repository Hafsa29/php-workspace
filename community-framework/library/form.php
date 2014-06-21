<?php

class Form{

	private $config;
	private $errors;
	private $error_exists;
	public function __construct($config = array()){
		$this->config = $config;
		$errors = '';
		$error_exists = false;
	}

	public function run(){
		foreach($this->config as $i){
			if(!isset($_POST[$i['field']])){
				$value = null;
			} else{
				$value = $_POST[$i['field']];
			}
			$rules = explode('|', $i['rules']);
			foreach($rules as $j){
				switch($j){
					case 'required':
						if(is_null($value)){
							$this->error_exists = true;
							$new_error = "{$i['label']} is empty!<br>";
							$this->errors.=$new_error;
						}
						break;
					case 'email':
						if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)){
							$this->error_exists = true;
							$new_error = "{$i['label']} is not a valid email!<br>";
							$this->errors.=$new_error;
						}
						break;
					case 'url':
						if(!preg_match("/^((ht|f)tp(s?)\:\/\/|~/|/)?([w]{2}([\w\-]+\.)+([\w]{2,5}))(:[\d]{1,5})?/", $value)){
							$this->error_exists = true;
							$new_error = "{$i['label']} is not a valid url!<br>";
							$this->errors.=$new_error;
						}
						break;
				}
			}
		}
		return !$this->error_exists;
	}
	public function getErrors(){
		return $this->errors;
	}
}