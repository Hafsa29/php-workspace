<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('base');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->base->show_index();
	}
	public function category($id, $c){
		$this->base->category($id, $c);
	}
	public function product($id, $p){
		$this->base->product($id, $p);
	}
	public function logout(){
		$this->base->logout();
	}
	public function history($id){
		$this->base->history($id);
	}
	public function shopping_cart($id){
		$this->base->shopping_cart($id);
	}
	public function add_to_shopping_cart($id, $p){
		$this->base->add_to_shopping_cart($id, $p);
	}
	public function remove_from_shopping_cart($id, $p){
		$this->base->remove_from_shopping_cart($id, $p);
	}
	public function purchase($id){
		$this->base->purchase($id);
	}
	public function search($id){
		$this->base->search();
	}
	public function show_search($id){
		$this->base->show_search($id);
	}
}