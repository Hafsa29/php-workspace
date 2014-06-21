<?php
class Base extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	function show_index(){
		$this->check_session($this->session->userdata('id'));

		$data['id'] = $this->session->userdata('id');

		$query = "select pro_id, pro_name, photo from product where category = 'brownie';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['brownies'] = $result;

		$query = "select pro_id, pro_name, photo from product where category = 'macaroon';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['macaroons'] = $result;

		$query = "select pro_id, pro_name, photo from product where category = 'chocolate';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['chocolates'] = $result;

		$query = "select pro_id, pro_name, photo from product where category = 'liquorice';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['liquorice'] = $result;

		$query = "select pro_id, pro_name, photo from product where category = 'pastry';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['pastries'] = $result;

		$query = "select pro_id, pro_name, photo from product where category = 'cake';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['cakes'] = $result;

		$query = "select pro_id, pro_name, photo from product where category = 'biscuit';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['biscuits'] = $result;

		$this->load->view('user/index', $data);
	}
	function category($id, $c){
		$this->check_session($id);

		$data['id'] = $id;

		$query = "select pro_id, pro_name, photo from product where category = '{$c}';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['category'] = $result;
		$c = ucfirst($c).'s';
		$data['header'] = $c;
		$this->load->view('user/category', $data);
	}
	function product($id, $p){
		$this->check_session($id);

		$data['id'] = $id;

		$shopping_cart = $this->session->userdata('shopping_cart');
		$data['exists'] = in_array($p, $shopping_cart);
		$data['empty'] = false;
		if(!$data['exists']){
			$query = "select stock from product where pro_id = '{$p}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			if($result['stock'] == 0){
				$data['empty'] = true;
			}
		}

		$query = "select * from product where pro_id = '{$p}';";
		$result = $this->db->query($query);
		$result = $result->row_array();
		$data['product'] = $result;
		$this->load->view('user/product', $data);
	}
	function history($id){
		$this->check_session($id);

		$data['id'] = $id;

		$query = "select pro_id, pro_name, photo from product natural join purchase where cus_id = '{$id}';";
		$result = $this->db->query($query);
		$data['history'] = $result->result_array();
		$this->load->view('user/history', $data);
	}
	function shopping_cart($id){
		$this->check_session($id);

		$data['id'] = $id;

		$shopping_cart = $this->session->userdata('shopping_cart');
		if(empty($shopping_cart)){
			$data['shopping_cart'] = array();
		}
		else{
			foreach($shopping_cart as $i){
				$query = "select pro_name, photo from product where pro_id = '{$i}';";
				$result = $this->db->query($query);
				$result = $result->row_array();
				$data['shopping_cart']["$i"] = $result;
			}
		}
		$this->load->view('user/shopping_cart', $data);
	}
	function add_to_shopping_cart($id, $p){
		$shopping_cart = $this->session->userdata('shopping_cart');
		$this->session->unset_userdata('shopping_cart');
		array_push($shopping_cart, $p);
		$this->session->set_userdata('shopping_cart', $shopping_cart);

		$this->product($id, $p);
	}
	function remove_from_shopping_cart($id, $p){
		$shopping_cart = $this->session->userdata('shopping_cart');
		$this->session->unset_userdata('shopping_cart');
		$key = array_search($p, $shopping_cart);
		unset($shopping_cart[$key]);
		$this->session->set_userdata('shopping_cart', $shopping_cart);

		$this->shopping_cart($id);
	}
	function purchase($id){
		foreach ($this->session->userdata('shopping_cart') as $i) {
			$query = "update product set stock = stock - 1 where pro_id = '{$i}';";
			$this->db->query($query);
			$query = "insert into purchase(pro_id, cus_id) values('{$i}', '{$id}');";
			$this->db->query($query);
		}
		$this->session->unset_userdata('shopping_cart');
		$this->session->set_userdata('shopping_cart', array());
		$this->history($id);
	}
	function search($id){
		$query = "select pro_id, pro_name from product where pro_name like '%{$this->input->post('search')}%';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$this->output
			->set_content_type('application/json')
		    ->set_output(json_encode($result));
	}
	function show_search($id){
		$this->check_session($id);

		$data['id'] = $id;

		$query = "select pro_id, pro_name from product where pro_name like '%{$this->input->post('search')}%';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['search'] = $result;
		$this->load->view('user/search', $data);		
	}
	function logout(){
		$this->session->sess_destroy();
		redirect("./viewer");
	}
	function check_session($id){
		if(!$this->session->userdata('logged_in') || $id!=$this->session->userdata('id')){
			redirect("./viewer");	
		}
	}
}
?>