<?php
	class Commandee{
		public function __construct(){
			$CI =& get_instance();
			$CI->load->database();
			$CI->load->library('session');
		}
		public function set_problem($d_id, $d_name){
			$CI = &get_instance();

			$problems = $CI->session->userdata('problems');
			$CI->session->unset_userdata('problems');
			$arr = array('name' => $d_name, 'id' => $d_id);
			array_push($problems, $arr);
			$newdata = array(
				'problems' => $problems
			);
			$CI->session->set_userdata($newdata);
		}
		public function set_tutorial($d_id, $d_name){
			$CI = &get_instance();

			$tutorials = $CI->session->userdata('tutorials');
			$CI->session->unset_userdata('tutorials');
			$arr = array('name' => $d_name, 'id' => $d_id);
			array_push($tutorials, $arr);
			$newdata = array(
				'tutorials' => $tutorials
			);
			$CI->session->set_userdata($newdata);
		}
		public function unset_problem($d_id){
			$CI =& get_instance();
			$problems = $CI->session->userdata('problems');
			$CI->session->unset_userdata('problems');
			foreach($problems as $key=>$value)
			{
				if($value['id'] == $d_id)
				{
					unset($problems[$key]);
					break;
				}
			}
					
			$newdata = array(
				'problems' => $problems
			);
			$query = "delete from problem where p_id = '{$d_id}';";
			$CI->session->set_userdata($newdata);
			$CI->db->query($query);
		}
		public function unset_tutorial($d_id){
			$CI =& get_instance();
			$tutorials = $CI->session->userdata('tutorials');
			$CI->session->unset_userdata('problems');
			foreach($tutorials as $key=>$value)
			{
				if($value['id'] == $d_id)
				{
					unset($tutorials[$key]);
					break;
				}
			}
					
			$newdata = array(
				'tutorials' => $tutorials
			);
			$query = "delete from tutorial where t_id = '{$d_id}';";
			$CI->session->set_userdata($newdata);
			$CI->db->query($query);
		}
	}
	abstract class Command{
		public $comd;
		public function __construct(){
			$this->comd = new Commandee();
		}
		abstract function execute($d_id);
	}
?>