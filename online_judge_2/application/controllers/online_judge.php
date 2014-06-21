<?php

	class Online_judge extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			header('Cache-Control: no-cache, no-store, must-revalidate');
			header('Pragma: no-cache');
			header('Expires: 0');
			$this->load->helper('url');
			$this->load->model('site');
		}
		
		public function index()
		{
			$this->load->library(array('form_validation', 'session'));
			if(!$this->session->userdata('logged_in'))
			{
				$this->load->view('index');
			}
			else
			{
				$this->home($this->session->userdata('u_id'));
			}
		}
		public function login()
		{
			$this->load->model('base');
			$this->base->login();
		}
		public function sign_up()
		{
			$this->load->model('base');
			session_start();

			if($_POST['s3capcha'] == $_SESSION['s3capcha'] && $_POST['s3capcha'] != '') 
			{
    			unset($_SESSION['s3capcha']);
    			$this->base->sign_up();
			} 
			else 
			{
    			$url = base_url();
				redirect($url);
			}
			
		}
		public function home($u_id)
		{
			$this->site->home($u_id);
		}
		public function profile($u_id)
		{
			$this->site->profile($u_id, '');
		}
		public function other_profile($u_id, $other_id)
		{
			if($u_id == $other_id) redirect("./online_judge/profile/{$u_id}");
			else $this->site->other_profile($u_id, $other_id);
		}
		public function ranklist($u_id)
		{
			$this->site->ranklist($u_id);
		}
		public function problems($u_id)
		{
			$this->site->documents($u_id, 'problems');	
		}
		public function tutorials($u_id)
		{
			$this->site->documents($u_id, 'tutorials');	
		}
		public function problem($u_id, $p_id)
		{
			$this->site->document($u_id, $p_id, 'problem');
		}
		public function tutorial($u_id, $t_id)
		{
			$this->site->document($u_id, $t_id, 'tutorial');
		}
		public function submit($u_id)
		{
			$this->site->submit($u_id);
		}
		public function comment_problem($u_id, $p_id)
		{
			$this->site->comment($u_id, $p_id, 'problem');
		}
		public function comment_tutorial($u_id, $t_id)
		{
			$this->site->comment($u_id, $t_id, 'tutorial');
		}
		public function download_problem($u_id, $p_id)
		{
			$this->site->download($u_id, $p_id, 'problem');
		}
		public function download_tutorial($u_id, $t_id)
		{
			$this->site->download($u_id, $t_id, 'tutorial');
		}
		public function submit_solution($u_id, $p_id)
		{
			$this->site->solution($u_id, $p_id);
		}
		public function upload_picture($u_id)
		{
			$this->site->upload($u_id, 'picture');	
		}
		public function upload_problem($u_id)
		{
			$this->site->upload($u_id, 'problem');	
		}
		public function upload_tutorial($u_id)
		{
			$this->site->upload($u_id, 'tutorial');	
		}
		public function upload_link_problem($u_id)
		{
			$this->site->upload($u_id, 'link_problem');	
		}
		public function upload_link_tutorial($u_id)
		{
			$this->site->upload($u_id, 'link_tutorial');	
		}
		public function upload_solution($u_id)
		{
			$this->site->upload($u_id, 'solution');	
		}
		public function upload_individual_solution($u_id)
		{
			$this->site->upload_solution($u_id);
		}
		public function unset_problem($u_id, $p_id)
		{
			$this->site->unset_file($u_id, $p_id, 'problem');
		}
		public function unset_tutorial($u_id, $t_id)
		{
			$this->site->unset_file($u_id, $t_id, 'tutorial');
		}
		public function check_email($email)
		{
			$this->load->library('encrypt');
			$query = "select u_password from user where u_email = '{$email}';";
			$result = $this->db->query($query);
			$num = $result->num_rows();
			if($num > 0)
			{
				$result = $result->row_array();
				$password = $this->encrypt->decode($result['u_password']);
				if($password == $this->input->post('login_password'))
				{
					return true;
				}
				else
				{
					$this->form_validation->set_message('check_email', "Oops! %s doesn't match Password");
					return false;
				}
			}
			else
			{
				$this->form_validation->set_message('check_email', "Oops! %s doesn't exist");
				return false;
			}			
		}
		public function logout()
		{
			$this->load->model('base');
			$this->base->logout();
		}
		public function contact(){
			$this->load->view('contact');
		}
	}
?>