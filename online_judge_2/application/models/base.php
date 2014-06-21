<?php
	class Base extends CI_Model
	{
		public function __construct()
		{
			parent:: __construct();
			$this->load->library('session'); 
		}
		public function login()
		{
			$this->load->library('singleton');
			$this->singleton->login();
		}
		public function sign_up()
		{	
			$this->load->library('singleton');
			$this->singleton->sign_up();
		}
		public function logout()
		{
			$this->session->sess_destroy();
			$url = base_url();
			redirect($url);
		}
	}
?>