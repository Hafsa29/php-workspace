<?php
	class Site extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
		}
		public function email(){
			echo 'I am here';
		}
	}
?>