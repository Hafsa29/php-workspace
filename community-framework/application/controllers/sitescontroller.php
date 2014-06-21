<?php
require_once(ROOT . DS . 'library' . DS . 'controller.php');
class SitesController extends Controller{
	public function index(){
		$session = new Session;
		if($session->userdata('logged_in') == true){
			$url = new Url;
			$url->redirect('sites/home');
		} else{
			$this->setView('index');
		}
	}
	public function home(){
		$session = new Session;
		if($session->userdata('logged_in') == true){
			$this->setView('home');
		} else{
			$url = new Url;
			$url->redirect();
		}
	}
	public function contact(){
		$this->setView('contact');
	}
}