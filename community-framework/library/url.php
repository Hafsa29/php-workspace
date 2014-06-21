<?php
class Url{
	private $base_url;

	public function __construct(){
		global $config;
		$this->base_url = $config['base_url'];
	}

	public function base_url($url = ""){
		$url = $this->base_url . 'public/' . $url;
		return $url;
	}
	public function site_url($url = ""){
		$url = $this->base_url . $url;
		return $url;
	}
	public function redirect($url = ""){
		$url = $this->base_url . $url;
		header("Location: {$url}");
	}
	public function redirect_back(){
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}
}