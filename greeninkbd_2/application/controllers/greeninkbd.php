<?php
	class GreenInkBD extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
		}
		public function index(){
			$this->load->view('index');
		}
		public function home(){
			$this->load->view('home');
		}
		public function works(){
			$this->load->view('works');
		}
		public function clients(){
			$this->load->view('clients');
		}
		public function contact(){
			$this->load->view('contact');
		}
		public function news($n_id = null){
			$this->load->view('news');
		}
		public function email(){
			$this->load->model('site');
			
			$this->site->email();
		}
	}
?>