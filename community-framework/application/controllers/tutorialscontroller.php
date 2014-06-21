<?php
require_once(ROOT . DS . 'library' . DS . 'controller.php');
class TutorialsController extends Controller{
	public function viewall(){
		$tutorial = new Tutorial;
		$tutorials = $tutorial->getall();
		$this->setView('tutorials');
		$this->set('tutorials', $tutorials);
	}
	public function view($id){
		$tutorial = new Tutorial;
		$curr_tutorial = $tutorial->get($id);
		$this->setView('tutorial');
		$this->set('tutorial', $curr_tutorial);
	}
	public function show_upload(){
		$this->setView('upload_tutorial');
	}
	public function upload(){
		echo 'i am here';
	}
}