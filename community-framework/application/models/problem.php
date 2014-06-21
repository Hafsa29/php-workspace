<?php
require_once(ROOT . DS . 'library' . DS . 'model.php');

class Problem extends Model{
	public function getAll(){
		$query = "select id, name, type from problems;";
		$this->query($query);
		return $this->getResult();
	}

	public function get($id){
		$query = "select id, name, type from problems where id = {$id};";
		$this->query($query);
		return $this->getRow();
	}

	public function insert($name, $type){
		$session = new Session;
		$id = $session->userdata('id');
		$query = "insert into problems(name, type, user_id) values('{$name}', '{$type}', '{$id}');";
		$this->query($query);
	}
}