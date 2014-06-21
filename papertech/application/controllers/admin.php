<?php

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('base');
	} 
	public function index(){
		$this->load->library('session');
		if($this->session->userdata('logged_in')){
			redirect("./admin/home/{$this->session->userdata('u_id')}");	
		}
		else{
			$data['result'] = '';
			$this->load->view('admin/index', $data);
		}
	}
	public function sign_in(){
		$this->base->sign_in();
	}
	public function sign_up($u_id){
		$this->base->sign_up($u_id);
	}
	public function change_account($u_id){
		$this->base->change_account($u_id);
	}
	public function home($u_id){
		$this->base->home($u_id);
	}
	public function profile($u_id){
		$this->base->profile($u_id);
	}
	public function events($u_id){
		$this->base->events($u_id);	
	}
	public function add_event($u_id){
		$this->base->add_event($u_id);
	}
	public function edit_event($u_id, $e_id){
		$this->base->edit_event($u_id, $e_id);
	}
	public function change_event($u_id, $e_id){
		$this->base->change_event($u_id, $e_id);
	}
	public function add_pictures($u_id, $e_id){
		$this->base->add_pictures($u_id, $e_id);
	}
	public function delete_picture($u_id, $e_id, $p_id){
		$this->base->delete_picture($u_id, $e_id, $p_id);
	}
	public function delete_event($u_id, $e_id){
		$this->base->delete_event($u_id, $e_id);
	}
	public function logout($u_id){
		$this->base->logout($u_id);
	}
	public function captcha(){
		$this->load->view('captcha');
	}
	public function chk_email($email, $u_id){
		$flag = true;
		$query = "select u_email from user where u_id <> '{$u_id}';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		foreach($result as $r){
			if($r['u_email'] == $email){
				$flag = false;
				break;
			}
		}
		return $flag;
	}
	public function chk_pass($pass, $u_id){
		$query = "select u_password from user where u_id = '{$u_id}';";
		$result = $this->db->query($query);
		$result = $result->row_array();
		$new_pass = $result['u_password'];
		if($new_pass == $pass){
			return true;
		}
		else{
			return false;
		}
	}
	public function chk_pass_2($pass, $u_id){
		$flag = true;
		$query = "select u_password from user where u_id <> '{$u_id}';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		foreach($result as $r){
			if($r['u_password'] == $pass){
				$flag = false;
				break;
			}
		}
		return $flag;
	}
}