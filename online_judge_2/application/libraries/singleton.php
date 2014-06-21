<?php
	class Login{
		private function __construct(){

		}
		static function login($u_id)
		{
			$CI =& get_instance();
			$CI->load->library('session'); 
			$newdata = array(
           		'u_id'  => $u_id,
               	'logged_in' => TRUE,
				'problems' => array(),
				'tutorials' => array()
           	);
			$CI->session->set_userdata($newdata);
			redirect("./online_judge/home/{$u_id}");
		}
	}
	class Singleton{
		public function __construct(){
			$CI =& get_instance();
			$CI->load->database();
			$CI->load->library(array('encrypt', 'form_validation')); 
		}
		public function login(){
			$CI =& get_instance();
			$CI->form_validation->set_error_delimiters('<div id="errors">', '</div>');
			$CI->form_validation->set_rules('login_email', 'Email', 'callback_check_email');
			if($CI->form_validation->run())
			{
				$query = "select u_id from user where u_email = '{$CI->input->post('login_email')}';";
				$result = $CI->db->query($query);
				$result = $result->row_array();
				$u_id = $result['u_id'];
				Login::login($u_id);
			}
			else
			{
				$CI->load->view('index');
			}
		}
		public function sign_up(){
			$CI =& get_instance();
			$CI->form_validation->set_error_delimiters('<div id="errors">', '</div>');
			$CI->form_validation->set_rules('sign_up_email', 'Email', 'is_unique[user.u_email]');
			
			session_destroy();
			
			if($CI->form_validation->run())
			{
				$name = "{$CI->input->post('first_name')} {$CI->input->post('last_name')}";
				$email = $CI->input->post('sign_up_email');
				$password = $CI->encrypt->encode($CI->input->post('sign_up_password'));
				$query = "insert into user(u_name, u_email, u_password) values('{$name}', '{$email}', '{$password}');";
				$CI->db->query($query);
				$query = "select u_id from user where u_email = '{$email}';";
				$result = $CI->db->query($query);
				$result = $result->row_array();
				$u_id = $result['u_id'];
				Login::login($u_id);
			}
			else
			{
				$CI->load->view('index');
			}
		}
	}
?>