<?php
	class Site extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->database();
		}
		public function email(){
			$this->load->library('email');

			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to('info@greeninkbd.com');

			$this->email->subject('Customer Feedback');
			$this->email->message($this->input->post('message'));	

			if($this->email->send()){
				echo 'Mail sent successfully!';
			}
			else{
				echo "A problem was encountered!";
			}
		}
	}
?>