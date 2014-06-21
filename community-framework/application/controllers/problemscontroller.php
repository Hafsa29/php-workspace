<?php
require_once(ROOT . DS . 'library' . DS . 'controller.php');
class ProblemsController extends Controller{
	public function viewall(){
		$problem = new Problem;
		$problems = $problem->getall();
		$this->setView('problems');
		$this->set('problems', $problems);
	}
	public function view($id){
		$problem = new Problem;
		$curr_problem = $problem->get($id);
		$this->setView('problem');
		$this->set('problem', $curr_problem);
	}
	public function show_upload(){
		$this->setView('upload_problem');
	}
	public function upload(){
		echo 'i am here';
	}
}