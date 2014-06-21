<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('site');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->site->show_index();
	}
	public function login_register(){
		$this->site->show_login_register();
	}
	public function category($c){
		$this->site->category($c);
	}
	public function product($p){
		$this->site->product($p);
	}
	public function search(){
		$this->site->search();
	}
	public function sign_in(){
		$this->site->sign_in();
	}
	public function sign_up(){
		$this->site->sign_up();
	}
	public function username_exists($u){
		$query = "select cus_id from customer where username = '{$u}';";
		$result = $this->db->query($query);
		$result = $result->num_rows();
		if($result > 0){
			return true;
		}
		else{
			$this->form_validation->set_message('username_exists', "This %s doesn't exist");
			return false;
		}
	}
	public function validate_password($p){
		$query = "select cus_id from customer where username = '{$this->input->post('sign_in_username')}' and password = '{$this->input->post('sign_in_password')}';";
		$result = $this->db->query($query);
		$result = $result->num_rows();
		if($result > 0){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_password', "This %s doesn't match the Username");
			return false;
		}	
	}
}