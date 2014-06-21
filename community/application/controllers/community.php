<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('site');
	}
	public function index(){
		$this->site->indexPage();
	}
	public function category($category){
		$this->site->categoryPage($category);
	}
	public function product($id){
		$this->site->productPage($id);
	}
	public function admin_panel(){
		$this->site->adminPanel();
	}
	public function user_profile(){
		$this->site->userProfile();
	}
	public function register_user(){
		$this->site->registerUser();
	}
	public function confirm_user($id){
		$this->site->confirmUser($id);
	}
	public function login_user(){
		$this->site->loginUser();
	}
	public function logout_user(){
		$this->site->logoutUser();
	}
	public function register_product(){
		$this->site->registerProduct();
	}
	public function buy_product(){
		$this->site->buyProduct();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */