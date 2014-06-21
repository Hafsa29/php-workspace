<?php
	class Base extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->database();
		}
		function sign_in(){
			$this->load->library('form_validation');

			session_start();

			if($this->input->post('captcha') == $_SESSION['random_code']){
				$config = array(
					array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'required|valid_email'
					),
					array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required|alpha_dash|min_length[6]|max_length[20]'
					)
				);
				$this->form_validation->set_rules($config);
				if($this->form_validation->run()){
					$query = "select u_id from user where u_email = '{$this->input->post('email')}' and u_password = '{$this->input->post('password')}';";
					$result = $this->db->query($query);
					if($result->num_rows() > 0){
						$result = $result->row_array();
						$u_id = $result['u_id'];
						$data = array(
							'u_id' => $u_id,
							'logged_in' => true
						);
						$this->session->set_userdata($data);
						redirect("./admin/home/{$u_id}");
					}
					else{
						$data['result'] = "Email and Password doesn't match";
						$this->load->view('admin/index', $data);
					}
				}
				else{
					$data['result'] = validation_errors();
					$this->load->view('admin/index', $data);
				}	
			}
			else{
				$data['result'] = 'Wrong Captcha';
				$this->load->view('admin/index', $data);
			}
		}
		function sign_up($u_id){
			$this->check_session($u_id);
			$this->load->library('form_validation');

			$config = array(
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|valid_email|is_unique[user.u_email]'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'required' => 'required|alpha_dash|is_unique[user.u_password]|min_length[6]|max_length[20]'
				),
				array(
					'field' => 'conf_password',
					'label' => 'Password Confirmation',
					'rules' => 'requied|alpha_dash|matches[password]'
				)
			);
			$this->form_validation->set_rules($config);

			if($this->form_validation->run()){
				$query = "insert into user(u_email, u_password) values('{$this->input->post('email')}', '{$this->input->post('password')}');";
				$this->db->query($query);
				redirect("./admin/profile/{$u_id}");
			}
			else{
				$data['result_1'] = validation_errors();
				$data['result_2'] = '';
				$data['u_id'] = $u_id;
				$this->load->view('admin/profile', $data);
			}
		}
		function change_account($u_id){
			$this->check_session($u_id);
			$this->load->library('form_validation');

			$config = array(
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => "required|valid_email|callback_chk_email[{$u_id}]"
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => "required|alpha_dash|min_length[6]|max_length[20]|callback_chk_pass_2[{$u_id}]"
				),
				array(
					'field' => 'conf_password',
					'label' => 'Password Confirmation',
					'rules' => 'required|alpha_dash|matches[password]'
				),
				array(
					'field' => 'old_password',
					'label' => 'Old Passsword',
					'rules' => "required|alpha_dash|min_length[6]|max_length[20]|callback_chk_pass[{$u_id}]"
				)
			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run()){
				$query = "update user set u_email = '{$this->input->post('email')}', u_password = '{$this->input->post('password')}' where u_id = '{$u_id}';";
				$this->db->query($query);
				redirect("./admin/profile/{$u_id}");
			}
			else{
				$data['u_id'] = $u_id;
				$data['result_1'] = '';
				$data['result_2'] = validation_errors();
				$this->load->view('admin/profile', $data);
			}
		}
		function home($u_id){
			$this->check_session($u_id);
			$data['u_id'] = $u_id;
			$this->load->view('admin/home', $data);
		}
		function profile($u_id){
			$this->check_session($u_id);
			$data['result_1'] = '';
			$data['result_2'] = '';
			$data['u_id'] = $u_id;
			$this->load->view('admin/profile', $data);
		}
		function events($u_id){
			$this->check_session($u_id);
			$data['u_id'] = $u_id;
			$query = 'select e_id, e_header from event;';
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['events'] = $result;
			$data['result'] = '';
			$this->load->view('admin/events', $data);
		}
		function add_event($u_id){
			$this->check_session($u_id);
			$this->load->library('form_validation');
			$config = array(
				array(
					'field' => 'header',
					'label' => 'Header',
					'rules' => 'required|max_length[100]|is_unique[event.e_header]'
				),
				array(
					'field' => 'description',
					'label' => 'Description',
					'rules' => 'required'
				),
				array(
					'field' => 'date',
					'label' => 'Date',
					'rules' => 'required'
				)
			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run()){
				$query = "insert into event(e_header, e_description, e_date) values('{$this->input->post('header')}', '{$this->input->post('description')}', '{$this->input->post('date')}');";
				$this->db->query($query);
				$query = "select max(e_id) from event where e_header = '{$this->input->post('header')}' and e_description = '{$this->input->post('description')}' and e_date = '{$this->input->post('date')}';";
				$result = $this->db->query($query);
				$result = $result->row_array();
				$e_id = $result['max(e_id)'];
				mkdir("./pictures/{$e_id}");
				$count = 0;
				foreach($_FILES['userfile']['size'] as $file){
					if($file > 0) $count++;
				}
				for($i = 0; $i < $count; $i++){
					move_uploaded_file($_FILES['userfile']['tmp_name'][$i], "./temp_pictures/{$_FILES['userfile']['name'][$i]}");
					$this->img_man("./temp_pictures/{$_FILES['userfile']['name'][$i]}", $e_id);
					unlink("./temp_pictures/{$_FILES['userfile']['name'][$i]}");
				}
				redirect("./admin/events/{$u_id}");
			}
			else{
				$data['u_id'] = $u_id;
				$query = 'select e_id, e_header from event;';
				$result = $this->db->query($query);
				$result = $result->result_array();
				$data['events'] = $result;
				$data['result'] = validation_errors();
				$this->load->view('admin/events', $data);
			}
		}
		function edit_event($u_id, $e_id){
			$data['u_id'] = $u_id;
			$data['e_id'] = $e_id;
			$data['result'] = '';
			$query = "select p_id from picture where e_id = '{$e_id}';";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['pictures'] = $result;
			$this->load->view('admin/edit', $data);
		}
		function change_event($u_id, $e_id){
			$this->check_session($u_id);
			$this->load->library('form_validation');
			$config = array(
				array(
					'field' => 'header',
					'label' => 'Header',
					'rules' => "required|max_length[100]|callback_chk_header[{$e_id}]"
				),
				array(
					'field' => 'description',
					'label' => 'Description',
					'rules' => 'required'
				),
				array(
					'field' => 'date',
					'label' => 'Date',
					'rules' => 'required'
				)
			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run()){
				$query = "update event set e_header = '{$this->input->post('header')}', e_description = '{$this->input->post('description')}', e_date = '{$this->input->post('date')}' where e_id = '{$e_id}';";
				$this->db->query($query);
				redirect("./admin/edit_event/{$u_id}/{$e_id}");
			}
			else{
				$data['u_id'] = $u_id;
				$data['e_id'] = $e_id;
				$data['result'] = validation_errors();
				$query = "select p_id from picture where e_id = '{$e_id}';";
				$result = $this->db->query($query);
				$result = $result->result_array();
				$data['pictures'] = $result;
				$this->load->view("admin/edit_event/{$u_id}/{$e_id}");
			}
		}
		function add_pictures($u_id, $e_id){
			$this->check_session($u_id);
			$count = 0;
			foreach($_FILES['userfile']['size'] as $file){
				if($file > 0) $count++;
			}
			for($i = 0; $i < $count; $i++){
				move_uploaded_file($_FILES['userfile']['tmp_name'][$i], "./temp_pictures/{$_FILES['userfile']['name'][$i]}");
				$this->img_man("./temp_pictures/{$_FILES['userfile']['name'][$i]}", $e_id);
				unlink("./temp_pictures/{$_FILES['userfile']['name'][$i]}");
			}
			redirect("./admin/edit_event/{$u_id}/{$e_id}");
		}
		function delete_picture($u_id, $e_id, $p_id){
			$this->check_session($u_id);
			$query = "delete from picture where p_id = '{$p_id}';";
			$this->db->query($query);
			unlink("./pictures/{$e_id}/{$p_id}.jpg");
			redirect("./admin/edit_event/{$u_id}/{$e_id}");
		}
		function delete_event($u_id, $e_id){
			$this->check_session($u_id);
			$this->remove_dir("./pictures/{$e_id}");
			rmdir("./pictures/{$e_id}");
			$query = "delete from event where e_id = '{$e_id}';";
			$this->db->query($query);
			$query = "delete from picture where e_id = '{$e_id}';";
			$this->db->query($query);
			redirect("./admin/events/{$u_id}");
		}
		function logout($u_id){
			$this->check_session($u_id);
			$this->session->sess_destroy();
			redirect('./admin');
		}
		function img_man($file, $e_id){
			list($s_w, $s_h, $s_t) = getimagesize($file);
			if($s_w >= 338 && $s_h >= 169 && $s_w > $s_h){
				$ext = strtolower(end(explode('.', $file)));
				if($ext == 'jpg' || $ext == 'jpeg'){
					$s_img = imagecreatefromjpeg($file);
				}
				else if($ext == 'png'){
					$s_img = imagecreatefrompng($file);
				}
				else if($ext == 'gif'){
					$s_img = imagecreatefromgif($file);
				}
				else{
					return;
				}

				$w_ratio = $s_w / 338;
				$d_h = $s_h / $w_ratio;

				$d_img = imagecreatetruecolor(338, $d_h);
				imagecopyresampled($d_img, $s_img, 0, 0, 0, 0, 338, $d_h, $s_w, $s_h);
				$s_img = $d_img;
				$d_img = imagecreatetruecolor(338, 169);
				imagecopy($d_img, $s_img, 0, 0, 0, 0, 338, 169);
				$query = "insert into picture(e_id) values('{$e_id}');";
				$this->db->query($query);
				$query = "select max(p_id) from picture where e_id = '{$e_id}';";
				$result = $this->db->query($query);
				$result = $result->row_array();
				$p_id = $result['max(p_id)'];
				imagejpeg($d_img, "./pictures/{$e_id}/{$p_id}.jpg", 100);
				imagedestroy($d_img);
			}
			else{
				return;
			}
		}
		function remove_dir($files){
			foreach (glob($files.'/*') as $file) {
				unlink($file);
			}
		}
		function check_session($u_id){
			if($this->session->userdata('logged_in') && $this->session->userdata('u_id') == $u_id){
				return;
			}
			else{
				redirect("./admin");	
			}
		}
	}
?>