<?php
class Site extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
	}

	function indexPage(){
		$query = "select id, name from products where category = 'shirts';";
		$result = $this->db->query($query);
		$data['shirts'] = $result->result();
		$query = "select id, name from products where category = 'pants';";
		$result = $this->db->query($query);
		$data['pants'] = $result->result();
		$query = "select id, name from products where category = 't-shirts';";
		$result = $this->db->query($query);
		$data['tshirts'] = $result->result();
		$query = "select id, name from products where category = 'shorts';";
		$result = $this->db->query($query);
		$data['shorts'] = $result->result();
		$query = "select id, name from products where category = 'fatuas';";
		$result = $this->db->query($query);
		$data['fatuas'] = $result->result();
		$query = "select id, name from products where category = 'punjabis';";
		$result = $this->db->query($query);
		$data['punjabis'] = $result->result();
		$this->load->view('index', $data);
	}

	function categoryPage($category){
		switch($category){
			case 'shirts':
				$data['title'] = 'Shirts';
				break;
			case 'pants':
				$data['title'] = 'Pants';
				break;
			case 't-shirts':
				$data['title'] = 'T-Shirts';
				break;
			case 'shorts':
				$data['title'] = 'Shorts';
				break;
			case 'fatuas':
				$data['title'] = 'Fatuas';
				break;
			case 'punjabis':
				$data['title'] = 'Punjabis';
				break;
		}
		$query = "select id, name from products where category = '{$category}';";
		$result = $this->db->query($query);
		$data['products'] = $result->result();
		$this->load->view('category', $data);
	}

	function productPage($id){
		$query = "select id, name, stock, price from products where id = '{$id}';";
		$result = $this->db->query($query);
		$data['product'] = $result->row();
		$this->load->view('product', $data);
	}

	function adminPanel(){
		$this->load->view('admin_panel');
	}

	function userProfile(){
		$this->load->view('user_profile');
		$query = "select name, email";
	}

	function registerUser(){
		$this->load->library(array('form_validation', 'encrypt'));
		$rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[users.email]'
			), 
			array(
				'field' => 'address',
				'label' => 'Address',
				'rules' => 'required'
			),
			array(
				'field' => 'account',
				'label' => 'Account No.',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]'
			), 
			array(
				'field' => 'conf-password',
				'label' => 'Confirm Password',
				'rules' => 'required|min_length[6]|matches[password]'
			),
		);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()){
			$query = "insert into users(name, email, address, account, role, confirmed, password) values('{$this->input->post('name')}', '{$this->input->post('email')}', '{$this->input->post('address')}', '{$this->input->post('account')}', 1, 0, '{$this->encrypt->encode($this->input->post('password'))}');";
			$this->db->query($query);

			$query = "select id from users where email = '{$this->input->post('email')}';";
			$result = $this->db->query($query);
			$result = $result->row();

			$config = Array(
	  			'protocol' => 'smtp',
	  			'smtp_host' => 'ssl://smtp.gmail.com',
	  			'smtp_port' => 465,
	  			'smtp_user' => 'shamir.towsif@gmail.com',
	  			'smtp_pass' => 'georgeharrison0545',
	  			'mailtype' => 'html',
	  			'charset' => 'iso-8859-1',
	  			'wordwrap' => true
			);
			$url = site_url("community/confirm_user/{$result->id}");
	        $message = "<h1>Please click on the link below to verify your email.</h1><p><a href='{$url}'>Click Here!</p>";
	        $this->load->library('email', $config);
	      	$this->email->set_newline("\r\n");
	      	$this->email->from('shamir.towsif@gmail.com', 'Community');
	      	$this->email->to($this->input->post('email'));
	      	$this->email->subject('Confirm User');
	      	$this->email->message($message);
	      	$this->email->send();
	      	$this->session->set_flashdata('success', true);
	      	$this->session->set_flashdata('message', 'Verification Email Sent');
		} else{
			$message = validation_errors();
			$this->session->set_flashdata('error', true);
			$this->session->set_flashdata('message', $message);
		}
		redirect($this->input->server('HTTP_REFERER'), 'refresh');
	}

	function confirmUser($id){
		$query = "update users set confirmed = 1 where id = '{$id}';";
		$this->db->query($query);
		$query = "select id, name, role from users where id = '{$id}';";
		$result = $this->db->query($query);
		$result = $result->row();
		$this->session->set_userdata('id', $result->id);
		$this->session->set_userdata('name', $result->name);
		$this->session->set_userdata('role', $result->role);
		$this->session->set_userdata('logged_in', true);
		$this->session->set_flashdata('success', true);
		$this->session->set_flashdata('message', 'Confirmation Successful!');
		redirect(base_url(), 'refresh');
	}

	function loginUser(){
		$this->load->library(array('form_validation', 'encrypt'));
		$rules = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]'
			)
		);

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()){
			$query = "select password from users where email = '{$this->input->post('email')}';";
			$result = $this->db->query($query);
			$result = $result->row();
			if($result){
				$password = $this->encrypt->decode($result->password);
				if($password == $this->input->post('password')){
					$query = "select id, name, role from users where email = '{$this->input->post('email')}';";
					$result = $this->db->query($query);
					$result = $result->row();
					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('id', $result->id);
					$this->session->set_userdata('name', $result->name);
					$this->session->set_userdata('role', $result->role);
					$this->session->set_flashdata('success', true);
					$this->session->set_flashdata('message', 'Login Successful!');
				} else{
					$this->session->set_flashdata('error', true);
					$this->session->set_flashdata('message', "Email and Password doesn't match!");
				}
			} else{
				$this->session->set_flashdata('error', true);
				$this->session->set_flashdata('message', "Email doesn't exist!");
			}
		} else{
			$message = validation_errors();
			$this->session->set_flashdata('error', true);
			$this->session->set_flashdata('message', $message);
		}
		redirect($this->input->server('HTTP_REFERER'), 'refresh');
	}

	function logoutUser(){
		$this->session->sess_destroy();
		redirect($this->input->server('HTTP_REFERER'), 'refresh');
	}

	function registerProduct(){
		$this->load->library('form_validation');

		$rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|is_unique[products.name]'
			),
			array(
				'field' => 'category',
				'label' => 'Category',
				'rules' => 'required'
			),
			array(
				'field' => 'stock',
				'label' => 'Stock',
				'rules' => 'required|integer'
			),
			array(
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|integer'
			)
		);

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()){
			$config = array(
				'upload_path' => './assets/images/products/default',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => '2048',
				'file_name' => $this->input->post('name'),
				'remove_spaces' => false
			);

			$this->load->library('upload', $config);

			if($this->upload->do_upload()){
				$query = "insert into products(name, category, stock, price) values('{$this->input->post('name')}', '{$this->input->post('category')}', '{$this->input->post('stock')}', '{$this->input->post('price')}');";
				$this->db->query($query);
				$ext = end(explode('.', $_FILES['userfile']['name']));
				if($_FILES['userfile']['type'] == 'image/gif'){
					$image = imagecreatefromgif("./assets/images/products/default/{$this->input->post('name')}.{$ext}");
					imagejpeg($image, "./assets/images/products/default/{$this->input->post('name')}.jpg");
					unlink("./assets/images/products/default/{$this->input->post('name')}.{$ext}");
				} else if($_FILES['userfile']['type'] == 'image/png'){
					$image = imagecreatefrompng("./assets/images/products/default/{$this->input->post('name')}.{$ext}");
					imagejpeg($image, "./assets/images/products/default/{$this->input->post('name')}.jpg");
					unlink("./assets/images/products/default/{$this->input->post('name')}.{$ext}");
				} else if($_FILES['userfile']['type'] == 'image/jpeg'){
					$image = imagecreatefromjpeg("./assets/images/products/default/{$this->input->post('name')}.{$ext}");
					imagejpeg($image, "./assets/images/products/default/{$this->input->post('name')}.{$ext}");
				}
				$this->load->library('img_man', array(
					'image' => "./assets/images/products/default/{$this->input->post('name')}.jpg",
					'name' => $this->input->post('name')
				));
				$this->img_man->resize_image_large();
				$this->img_man->resize_image_small();
				$this->img_man->clear_image();
				$this->session->set_flashdata('success', true);
				$this->session->set_flashdata('message', 'Product has been registeres successfully!');
			} else{
				$this->session->set_flashdata('error', true);
      			$this->session->set_flashdata('message', $this->upload->display_errors());
			}
		} else{
			$message = validation_errors();
			$this->session->set_flashdata('error', true);
			$this->session->set_flashdata('message', $message);
		}

		redirect($this->input->server('HTTP_REFERER'), 'refresh');
	}

	function buyProduct(){
		$this->load->library('form_validation');
	}
}