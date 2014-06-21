<?php
	abstract class Builder{
		abstract function get_tried($p_id);
		abstract function get_solved($p_id);
		abstract function getObj();
	}
	class StatisticsBuilder extends Builder{
		private $statistics;
		function __construct(){
			$CI = &get_instance();
			$CI->load->database();
		}
		function get_tried($p_id){
			$CI = &get_instance();
			$query = "select distinct submission.u_id from problem, submission where problem.p_id = submission.p_id and problem.p_id = {$p_id};";
			$result = $CI->db->query($query);
			$this->statistics['tried'] = $result->num_rows();
		}
		function get_solved($p_id){
			$CI = &get_instance();
			$query = "select distinct submission.u_id from problem, submission where submission.result = 'AC' and problem.p_id = submission.p_id and problem.p_id = {$p_id};";
			$result = $CI->db->query($query);
			$this->statistics['solved'] = $result->num_rows();
		}
		function getObj(){
			return $this->statistics;
		}
	}
	abstract class Director{
		abstract function getObj();
	}
	class StatisticsDirector extends Director{
		private $builder;
		private $p_id;
		function __construct($param){
			$this->builder = new StatisticsBuilder();
			$this->p_id = $param[0];
		}
		function buildStatistics(){
			$this->builder->get_tried($this->p_id);
			$this->builder->get_solved($this->p_id);
		}
		function getObj(){
			$this->buildStatistics();
			return $this->builder->getObj();
		}
	}
?>