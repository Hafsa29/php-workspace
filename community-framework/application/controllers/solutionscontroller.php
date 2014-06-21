<?php
require_once(ROOT . DS . 'library' . DS . 'controller.php');

class SolutionsController extends Controller{
	public function show_upload(){
		$problem = new Problem;
		$problems = $problem->getAll();
		$adhoc = $mathematics = $data_structure = $graph_theory = $dynamic_programming = $computational_geometry = array();
		foreach($problems as $i){
			switch($i->type){
				case 'adhoc':
					array_push($adhoc, $i);
					break;
				case 'mathematics':
					array_push($mathematics, $i);
					break;
				case 'data_structure':
					array_push($data_structure, $i);
					break;
				case 'graph_theory':
					array_push($graph_theory, $i);
					break;
				case 'dynamic_programming':
					array_push($dynamic_programming, $i);
					break;
				case 'computational_geometry':
					array_push($computational_geometry, $i);
					break;
			}
		}
		$this->setView('upload_solution');
		$this->set('adhoc', $adhoc);
		$this->set('mathematics', $mathematics);
		$this->set('data_structure', $data_structure);
		$this->set('graph_theory', $graph_theory);
		$this->set('dynamic_programming', $dynamic_programming);
		$this->set('computational_geometry', $computational_geometry);
	}
	public function upload(){
		echo 'i am here';
	}
}