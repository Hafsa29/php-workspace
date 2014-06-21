<?php
class Site extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	function show_index(){
		$this->check_session();
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

		$this->load->view('viewer/index', $data);
	}
	function show_login_register($sign_in_error = '', $sign_up_error = ''){
		$this->check_session();
		$data['sign_in_error'] = $sign_in_error;
		$data['sign_up_error'] = $sign_up_error;
		$this->load->view('viewer/login_register', $data);
	} 
	function category($c){
		$this->check_session();
		$query = "select pro_id, pro_name, photo from product where category = '{$c}';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$data['category'] = $result;
		$c = ucfirst($c).'s';
		$data['header'] = $c;
		$this->load->view('viewer/category', $data);
	}
	function product($p){
		$this->check_session();
		$query = "select * from product where pro_id = '{$p}';";
		$result = $this->db->query($query);
		$result = $result->row_array();
		$data['product'] = $result;
		$this->load->view('viewer/product', $data);
	}
	function sign_in(){
		$this->load->library('form_validation');
		$config  = array(
			array(
				'field' => 'sign_in_username',
				'label' => 'Username',
				'rules' => 'required|callback_username_exists'
			),
			array(
				'field' => 'sign_in_password',
				'label' => 'Password',
				'rules' => 'required|callback_validate_password'
			)
		);
		$this->form_validation->set_rules($config);

		if($this->form_validation->run()){
			$query = "select cus_id from customer where username = '{$this->input->post('sign_in_username')}' and password = '{$this->input->post('sign_in_password')}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$this->show_user($result['cus_id']);
		}
		else{
			$error = validation_errors();
			$this->show_login_register($error, '');
		}
	}
	function sign_up(){
		$this->load->library('form_validation');
		$config = array(
			array(
				'field' => 'sign_up_username',
				'label' => 'Username',
				'rules' => 'required|is_unique[customer.username]'
			),
			array(
				'field' => 'sign_up_password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]'
			),
			array(
				'field' => 'sign_up_confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'required|matches[sign_up_password]'
			),
			array(
				'field' => 'sign_up_first_name',
				'label' => 'First Name',
				'rules' => 'required|alpha'
			),
			array(
				'field' => 'sign_up_last_name',
				'label' => 'Last Name',
				'rules' => 'required|alpha'
			),
			array(
				'field' => 'sign_up_address',
				'label' => 'Address',
				'rules' => 'required'
			),
			array(
				'field' => 'sign_up_phone',
				'label' => 'Phone',
				'rules' => 'required'
			),
			array(
				'field' => 'sign_up_email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[customer.email]'
			)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()){
			$query = "insert into customer(username, password, cus_name, address, phone, email) values('{$this->input->post('sign_up_username')}', '{$this->input->post('sign_up_password')}', '{$this->input->post('sign_up_first_name')} {$this->input->post('sign_up_last_name')}', '{$this->input->post('sign_up_address')}', '{$this->input->post('sign_up_phone')}', '{$this->input->post('sign_up_email')}');";
			$this->db->query($query);
			$query = "select cus_id from customer where username = '{$this->input->post('sign_up_username')}' and password = '{$this->input->post('sign_up_password')}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$this->show_user($result['cus_id']);
		}
		else{
			$error = validation_errors();
			$this->show_login_register('', $error);
		}
	}
	function search(){
		$query = "select pro_id, pro_name from product where pro_name like '%{$this->input->post('search')}%';";
		$result = $this->db->query($query);
		$result = $result->result_array();
		$this->output
			->set_content_type('application/json')
		    ->set_output(json_encode($result));
	}
	function check_session(){
		if($this->session->userdata('logged_in')){
			redirect("./user");	
		}
	}
	function show_user($id){
		$newdata = array(
        	'id'  => $id,
            'logged_in' => true,
            'shopping_cart' => array()
  		);
  		$this->session->set_userdata($newdata);
		redirect("./user");
	}
}
?>