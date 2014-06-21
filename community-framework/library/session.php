<?php

class Session{
	public function __construct(){
		if(session_status() === PHP_SESSION_NONE){
			session_start();
		}
	}

	public function set_userdata($name, $value){
		$encrypt = new Encrypt;
		$_SESSION[$name] = $encrypt->encode($value);
	}

	public function unset_userdata($name){
		if(isset($_SESSION[$name])){
			unset($_SESSION[$name]);
		}
	}

	public function userdata($name){
		if(isset($_SESSION[$name])){
			$encrypt = new Encrypt;
			return $encrypt->decode($_SESSION[$name]);
		} else{
			return false;
		}
	}

	public function set_flashdata($name, $value){
		$encrypt = new Encrypt;
		$_SESSION[$name] = $encrypt->encode($value);
	}

	public function flashdata($name){
		if(isset($_SESSION[$name])){
			$encrypt = new Encrypt;
			$message = $encrypt->decode($_SESSION[$name]);
			unset($_SESSION[$name]);
			return $message;
		} else{
			return false;
		}
	}

	public function destroy(){
		session_destroy();
	}
}