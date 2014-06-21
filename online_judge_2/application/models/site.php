<?php

	class Site extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}
		public function home($u_id)
		{
			$this->check_session($u_id);
			$this->load->library('session');
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['u_id'] = $u_id;
			$data['u_name'] = $result['u_name'];
			
			$data['problems'] = $this->session->userdata('problems');
			$data['tutorials'] = $this->session->userdata('tutorials');
			
			if(!$data['problems']) $data['problems'] = array();
			if(!$data['tutorials']) $data['tutorials'] = array();
			
			
			$this->load->view('home', $data);
		}
		public function profile($u_id, $error)
		{
			$this->check_session($u_id);
			
			$data['u_id'] = $u_id;
			
			$query = "select u_name, u_email from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['user'] = $result;
			
			$query = "select distinct problem.p_id, problem.p_given_name from submission, problem where submission.u_id = '{$u_id}' and problem.p_id = submission.p_id;";
			$result = $this->db->query($query);
			$data['tried_num'] = $result->num_rows();
			$result = $result->result_array();
			$data['tried'] = $result;
			
			
			$query = "select distinct problem.p_id, problem.p_given_name from submission, problem where submission.u_id = '{$u_id}' and result = 'AC' and problem.p_id = submission.p_id";
			$result = $this->db->query($query);
			$data['solved_num'] = $result->num_rows();
			$result = $result->result_array();
			$data['solved'] = $result;
			
			$query = "select p_id, p_given_name from problem where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['problems'] = $result;
			
			$query = "select t_id, t_given_name from tutorial where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['tutorials'] = $result;
			
			$query = "select pic_name from picture where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$num = $result->num_rows();
			
			if($num == 0)
			{
				$data['pictures'] = array(array('pic_name' =>'default.jpg'));
			}
			else
			{
				$data['pictures'] = $result->result_array();
			}
			$data['error'] = $error;
			$this->load->view('profile', $data);
		}
		public function other_profile($u_id, $other_id)
		{
			$this->check_session($u_id);
			
			$data['u_id'] = $u_id;
			
			$query = "select u_name, u_email from user where u_id = '{$other_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['user'] = $result;
			
			$query = "select distinct p_id, p_given_name from submission natural join problem where u_id = '{$other_id}';";
			$result = $this->db->query($query);
			$data['tried_num'] = $result->num_rows();
			$result = $result->result_array();
			$data['tried'] = $result;
			
			
			$query = "select distinct p_id, p_given_name from submission natural join problem where u_id = '{$other_id}' and result = 'AC';";
			$result = $this->db->query($query);
			$data['solved_num'] = $result->num_rows();
			$result = $result->result_array();
			$data['solved'] = $result;
			
			$query = "select p_id, p_given_name from problem where u_id = '{$other_id}';";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['problems'] = $result;
			
			$query = "select t_id, t_given_name from tutorial where u_id = '{$other_id}';";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['tutorials'] = $result;
			
			$query = "select pic_name from picture where u_id = '{$other_id}';";
			$result = $this->db->query($query);
			$num = $result->num_rows();
			
			if($num == 0)
			{
				$data['pictures'] = array(array('pic_name' =>'default.jpg'));
			}
			else
			{
				$data['pictures'] = $result->result_array();
			}
			$this->load->view('other_profile', $data);
		}
		public function ranklist($u_id)
		{	
			$this->check_session($u_id);
			
			$query = "select distinct p_id, u_id, u_name, count(result) from submission natural join user where result = 'AC' group by u_id order by count(result) desc;";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['first_rank'] = $result;
			
			$query = "select u_id, u_name from submission natural join user where result = 'WA' and not exists (select distinct p_id, u_id, u_name, count(result) from submission natural join user where result = 'AC' group by u_id order by count(result) desc) group by u_id order by count(result);";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$data['second_rank'] = $result;
			
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			
			$this->load->view('ranklist', $data);
		}
		public function documents($u_id, $documents)
		{	
			$this->check_session($u_id);
			$this->load->library('facade');
			
			switch($documents)
			{
				case 'problems':
					$this->facade->get_problems($u_id);
					break;
				case 'tutorials':
					$this->facade->get_tutorials($u_id);
					break;
			}
		}
		public function document($u_id, $d_id, $document)
		{
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			$data['d_id'] = $d_id;
			$data['document'] = $document;
			
			switch($document)
			{
				case 'problem':
					$query = "select p_name, p_given_name, p_format from problem where p_id = '{$d_id}';";
					$result = $this->db->query($query);
					$result = $result->row_array();
					$data['d_name'] = $result['p_name'];
					$data['d_given_name'] = $result['p_given_name'];
					$data['d_format'] = $result['p_format'];
					$query = "select u_id, u_name, comment from comment_p natural join user where p_id = '{$d_id}';";
					$result = $this->db->query($query);
					$result = $result->result_array();
					$data['comments'] = $result;
					$data['folder'] = 'problems/';
					$param = array($d_id);
					$this->load->library('statisticsdirector', $param);
					$data['stat'] = $this->statisticsdirector->getObj();
					break;
				case 'tutorial':
					$query = "select t_name, t_given_name, t_format from tutorial where t_id = '{$d_id}';";
					$result = $this->db->query($query);
					$result = $result->row_array();
					$data['d_name'] = $result['t_name'];
					$data['d_given_name'] = $result['t_given_name'];
					$data['d_format'] = $result['t_format'];
					$query = "select u_id, u_name, comment from comment_t natural join user where t_id = '{$d_id}';";
					$result = $this->db->query($query);
					$result = $result->result_array();
					$data['comments'] = $result;
					$data['folder'] = 'tutorials/';
					$data['stat']['tried'] = '';
					$data['stat']['solved'] = '';
					break;
			}
			$this->load->view('document', $data);
		}
		public function comment($u_id, $d_id, $document)
		{
			switch($document)
			{
				case 'problem':
					$query = "insert into comment_p(comment, u_id, p_id) values('{$this->input->post('comment')}', '{$u_id}', '{$d_id}');";
					$this->db->query($query);
					break;
				case 'tutorial':
					$query = "insert into comment_t(comment, u_id, t_id) values('{$this->input->post('comment')}', '{$u_id}', '{$d_id}');";
					$this->db->query($query);
					break;
			}
			redirect("online_judge/{$document}/{$u_id}/{$d_id}");
		}
		public function download($u_id, $d_id, $document)
		{
			$this->load->helper('download');
			switch($document)
			{
				case 'problem':
					$query = "select p_name, p_given_name from problem where p_id = '{$d_id}';";
					$result = $this->db->query($query);
					$result = $result->row_array();
					$name = $result['p_name'];
					$ext = end(explode('.', $name));
					$given_name = $result['p_given_name'].'.'.$ext;
					$data = file_get_contents("./problems/{$name}");
					force_download($given_name, $data);
					break;
				case 'tutorial':
					$query = "select t_name, t_given_name from tutorial where t_id = '{$d_id}';";
					$result = $this->db->query($query);
					$result = $result->row_array();
					$name = $result['t_name'];
					$ext = end(explode('.', $name));
					$given_name = $result['t_given_name'].'.'.$ext;
					$data = file_get_contents("./tutorials/{$name}");
					force_download($given_name, $data);
					break;
			}
			redirect("online_judge/{$document}/{$u_id}/{$d_id}");
		}
		public function submit($u_id)
		{
			$this->check_session($u_id);

			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			$data['error_problem'] = '';
			$data['error_tutorial'] = '';
			$data['error_solution'] = '';
			$this->load->view('submit', $data);
		}
		public function solution($u_id, $p_id)
		{
			$this->check_session($u_id);
			
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			$data['p_id'] = $p_id;
			$data['error_solution'] = '';
			$this->load->view('solution', $data);
		}
		public function upload($u_id, $file)
		{
			$this->load->library('decorator');
			$this->check_session($u_id);
			
			if(!empty($_FILES) || $file == 'link_tutorial' || $file == 'link_problem')
			{
				$this->load->library('concretefactory');
				$this->concretefactory->upload($u_id, $file);
			}
			else
			{
				$query = "select u_name from user where u_id = '{$u_id}';";
				$result = $this->db->query($query);
				$result = $result->row_array();
				$data['u_name'] = $result['u_name'];
				$data['u_id'] = $u_id;
				$error_message = $this->decorater->decorate_error_invalid();
				switch($file)
				{
					case 'picture':
						$this->profile($u_id, $error_message);
						break;
					case 'problem':
						$data['error_problem'] = $error_message;
						$data['error_tutorial'] = '';
						$data['error_solution'] = '';
						$this->load->view('submit', $data);
						break;
					case 'tutorial':
						$data['error_problem'] = '';
						$data['error_tutorial'] = $error_message;
						$data['error_solution'] = '';
						$this->load->view('submit', $data);
						break;
					case 'link_problem':
						$data['error_problem'] = $error_message;
						$data['error_tutorial'] = '';
						$data['error_solution'] = '';
						$this->load->view('submit', $data);
						break;
					case 'link_tutorial':
						$data['error_problem'] = '';
						$data['error_tutorial'] = $error_message;
						$data['error_solution'] = '';
						$this->load->view('submit', $data);
						break;
					case 'solution':
						$data['error_problem'] = '';
						$data['error_tutorial'] = '';
						$data['error_solution'] = $error_message;
						$this->load->view('submit', $data);
						break;
				}
			}
			
		}
		public function upload_solution($u_id)
		{
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $this->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['p_id']  = $this->input->post('problem_id');
			$ext = end(explode('.',$_FILES['userfile']['name']));
			$ext = strtolower($ext);
			
			if($ext == 'c' || $ext == 'cpp')
			{
				$query = "insert into submission(u_id, p_id, result) values('{$u_id}', '{$this->input->post('problem_id')}', 'judging');";
				$this->db->query($query);
						
				$query = "select max(s_id) as s_id from submission where u_id = '{$u_id}';";
				$result = $this->db->query($query);
				$result = $result->row_array();
				$s_id = $result['s_id'];
				$s_name = $s_id.'.'.$ext;
							
				$config['upload_path'] = './submissions/';
				$config['file_name'] = $s_name;
				$config['allowed_types'] = 'c|cpp';
				$config['max_size'] = '2048';
								
				$this->load->library('upload', $config);
								
				if ( ! $this->upload->do_upload())
				{
					$data['error_solution'] = 'File is Too Large!';
					$data['u_id'] = $u_id;
					$this->load->view('solution', $data);
				}
				else
				{
					$params = array($ext);
					$this->load->library('strategy', $params);
					$this->strategy->compile($u_id, $s_id, $s_name, $this->input->post('problem_id'));
					redirect("./online_judge/submit_solution/{$u_id}/{$this->input->post('problem_id')}");
				}
			}
			else
			{
				$data['error_solution'] = 'Invalid File Type!';
				$data['u_id'] = $u_id;
				$this->load->view('solution', $data);
			}
		}
		public function unset_file($u_id, $d_id, $file)
		{
			switch($file)
			{
				case 'problem':
					$this->load->library('unsetproblem');
					$this->unsetproblem->execute($d_id);
					break;
				case 'tutorial':
					$this->load->library('unsettutorial');
					$this->unsettutorial->execute($d_id);
					break;
			}
			redirect("online_judge/home/{$u_id}");
		}
		public function check_session($u_id)
		{
			$this->load->library('session');
			
			if(!$this->session->userdata('logged_in') || $this->session->userdata('u_id') != $u_id)
			{
				$url = base_url();
				redirect($url);
			}
		}
	}
?>