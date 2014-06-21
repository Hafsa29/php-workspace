<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Papertech extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	} 
	public function index(){
		$this->load->view('site/index');
	}
	public function home(){
		$this->load->view('site/home');
	}
	public function about_us(){
		$this->load->view('site/about_us');
	}
	public function products(){
		$this->load->view('site/products');
	}
	public function resources(){
		$this->load->view('site/resources');
	}
	public function clients(){
		$this->load->view('site/clients');
	}
	public function events(){
		$this->load->view('site/events');
	}
	public function contact(){
		$this->load->view('site/contact');
	}
	public function order(){
		$this->load->view('site/order');
	}
	public function email_contact(){
		$this->load->model('site');
		echo 'kaj hoise 1';
	}
	public function email_order(){
		$this->load->model('site');
		echo 'kaj hoise 2';
	}
}