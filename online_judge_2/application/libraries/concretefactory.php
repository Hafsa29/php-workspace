<?php
	abstract class AbstractFactory
	{
		abstract function upload($u_id, $file);
	}

	class Concretefactory extends AbstractFactory
	{
		function upload($u_id, $file)
		{
			$obj = NULL;
			switch($file)
			{
				case 'picture':
					$obj = new PictureFile;
					break;
				case 'problem':
					$obj = new ProblemFile;
					break;
				case 'tutorial':
					$obj = new TutorialFile;
					break;
				case 'link_problem':
					$obj = new LinkProblem;
					break;
				case 'link_tutorial':
					$obj = new LinkTutorial;
					break;
				case 'solution':
					$obj = new SolutionFile;
					break;
			}
			$obj->uploadfile($u_id);
		}
	}

	abstract class File
	{
		abstract function uploadfile($u_id);
	}
	
	class PictureFile extends File
	{
		function uploadfile($u_id)
		{
			$CI =& get_instance();
			
			$CI->load->library('decorator');
			$CI->load->helper('url');
			$CI->load->database();
			
			$ext = end(explode('.',$_FILES['userfile']['name']));
			$ext = strtolower($ext);
			if($ext == 'jpg' || $ext == 'png' || $ext == 'tif' || $ext == 'gif' || $ext == 'jpeg')
			{
				$img = getimagesize($_FILES['userfile']['tmp_name']);
				$width = $img[0];
				$height = $img[1];
				if($width >= 500 && $height >= 250)
				{
					$query  = "insert into picture(u_id) values('{$u_id}');";
					$CI->db->query($query);
					$query  = "select max(pic_id) as pic_id from picture where u_id = '{$u_id}';";
					$result = $CI->db->query($query);
					$result = $result->row_array();
					$pic_id = $result['pic_id'];
					$pic_name = $pic_id.'.'.$ext;
					$query  = "update picture set pic_name = '{$pic_name}' where pic_id = '{$pic_id}';";
					$CI->db->query($query);
							
					$config['upload_path'] = './pictures/';
					$config['file_name'] = $pic_name;
					$config['allowed_types'] = 'gif|jpg|png|tif|jpeg';
					$config['max_size'] = '2048';
					
					$CI->load->library('upload', $config);
							
					if ( !$CI->upload->do_upload() )
					{
						$error_message = $CI->decorator->decorate_error_large();
						$CI->profile($u_id, $error_message);
					}
					else
					{
						$config['image_library'] = 'gd2';
						$config['source_image']	= './pictures/'.$pic_name;
						$config['maintain_ratio'] = TRUE;
								
						if($width > $height) $config['width'] = 500;
						else $config['height'] = 250;
								
						$CI->load->library('image_lib', $config);
						$CI->image_lib->resize();
								
						redirect("./online_judge/profile/{$u_id}");
					}
				}
				else
				{
					$error_message = $CI->decorator->decorate_error_small();
					$CI->profile($u_id, $error_message);
				}
			}
			else
			{
				$error_message = $CI->decorator->decorate_error_invalid();
				$CI->profile($u_id, $error_message);
			}
		}
	}
	
	class ProblemFile extends File
	{
		function __construct(){
			$CI =& get_instance();
			
			$CI->load->library(array('session', 'decorator'));
			$CI->load->helper('url');
			$CI->load->database();	
		}
		function uploadfile($u_id)
		{
			$CI =& get_instance();

			$problem_name = $_FILES['userfile']['name'][0];
			$problem_size = $_FILES['userfile']['size'][0];
			$problem_path = $_FILES['userfile']['tmp_name'][0];
			$input_name = $_FILES['userfile']['name'][1];
			$input_size = $_FILES['userfile']['size'][1];
			$input_path = $_FILES['userfile']['tmp_name'][1];
			$output_name = $_FILES['userfile']['name'][2];
			$output_size = $_FILES['userfile']['size'][2];
			$output_path = $_FILES['userfile']['tmp_name'][2];


			if($this->check_problem($problem_name, $problem_size) && $this->check_input_output($input_name, $input_size, $output_name, $output_size))
			{
				$ext = strtolower(end(explode('.', $problem_name)));
				$p_id = $this->upload_problem($u_id, $problem_path, $ext);
				$this->upload_input_output($p_id, $input_path, $output_path);

				$CI->load->library('setproblem');
				$CI->setproblem->execute($p_id);

				redirect("./online_judge/submit/{$u_id}");
			}
			else
			{
				$query = "select u_name from user where u_id = '{$u_id}';";
				$result = $CI->db->query($query);
				$result = $result->row_array();
				$data['u_name'] = $result['u_name'];
				$data['u_id'] = $u_id;
				$error_message = $CI->decorator->decorate_error_invalid();
				$data['error_problem'] = $error_message;
				$data['error_tutorial'] = '';
				$data['error_solution'] = '';
				$data['u_id'] = $u_id;
				$CI->load->view('submit', $data);
			}
		}
		function upload_problem($u_id, $p_path, $ext){
			$CI =& get_instance();
			
			$query = "insert into problem(u_id, p_given_name, p_type, p_format) values('{$u_id}', '{$CI->input->post('name')}','{$CI->input->post('type')}', 'file');";
			$CI->db->query($query);
							
			$query = "select max(p_id) as p_id from problem where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$p_id = $result['p_id'];
			$p_name = $p_id.'.'.$ext;
							
			$query = "update problem set p_name = '{$p_name}' where p_id = '{$p_id}';";
			$CI->db->query($query);
							
			move_uploaded_file($p_path, './problems/'.$p_name);
			return $p_id;
		}
		function upload_input_output($p_id, $i_path, $o_path){
			move_uploaded_file($i_path, './inputs/'.$p_id.'.txt');
			move_uploaded_file($o_path, './outputs/'.$p_id.'.txt');
		}
		function check_problem($p_name, $p_size){
			$ext = end(explode('.', $p_name));
			$ext = strtolower($ext);

			if(($ext == 'docx' || $ext == 'pdf' || $ext == 'txt') && $p_size <= 5000000 ){
				return true;
			}
			else{
				return false;
			}
		}
		function check_input_output($i_name, $i_size, $o_name, $o_size){
			$ext1 = end(explode('.', $i_name));
			$ext1 = strtolower($ext1);
			$ext2 = end(explode('.', $o_name));
			$ext2 = strtolower($ext2);
			$size = 5000000;

			if($ext1 == 'txt' && $ext2 == 'txt' && $i_size <= $size && $o_size <= $size){
				return true;
			}
			else{
				return false;
			}
		}
	}
	class TutorialFile extends File
	{
		function uploadfile($u_id)
		{
			$CI =& get_instance();
			
			$CI->load->library(array('session', 'decorator'));
			$CI->load->helper('url');
			$CI->load->database();
			
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			
			$ext = end(explode('.',$_FILES['userfile']['name']));
			$ext = strtolower($ext);
					
			if($ext == 'pdf' || $ext == 'docx' || $ext == 'mp4' || $ext == 'avi' || $ext == 'txt')
			{
				$query = "insert into tutorial(u_id, t_given_name, t_type, t_format) values('{$u_id}', '{$CI->input->post('name')}','{$CI->input->post('type')}', 'file');";
				$CI->db->query($query);
					
				$query = "select max(t_id) as t_id from tutorial where u_id = '{$u_id}';";
				$result = $CI->db->query($query);
				$result = $result->row_array();
				$t_id = $result['t_id'];
				$t_name = $t_id.'.'.$ext;
					
				$query = "update tutorial set t_name = '{$t_name}' where t_id = '{$t_id}';";
				$CI->db->query($query);
						
				$config['upload_path'] = './tutorials/';
				$config['file_name'] = $t_name;
				$config['allowed_types'] = 'pdf|docx|txt|avi|mp4';
				$config['max_size'] = '2048';
							
				$CI->load->library('upload', $config);
							
				if ( ! $CI->upload->do_upload())
				{
					$error_message = $CI->decorator->decorate_error_large();
					$data['error_problem'] = '';
					$data['error_tutorial'] = $error_message;
					$data['error_solution'] = '';
					$CI->load->view('submit', $data);
				}
				else
				{
					$CI->load->library('settutorial');
					$CI->settutorial->execute($t_id);
					redirect("./online_judge/submit/{$u_id}");
				}
			}
			else
			{
				$error_message = $CI->decorator->decorate_error_invalid();
				$data['error_problem'] = '';
				$data['error_tutorial'] = $error_message;
				$data['error_solution'] = '';
				$CI->load->view('submit', $data);
			}
		}
	}
	
	class LinkTutorial extends File
	{
		function uploadfile($u_id)
		{
			$CI =& get_instance();
			
			$CI->load->library('session');
			$CI->load->helper('url');
			$CI->load->database();
			
			$query = "insert into tutorial(t_type, t_name, t_given_name, u_id, t_format) values('{$CI->input->post('type')}', '{$CI->input->post('link')}', '{$CI->input->post('name')}', '{$u_id}', 'link');";
			$CI->db->query($query);
			
			$query = "select max(t_id) as t_id from tutorial where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$t_id = $result['t_id'];
			
			$CI->load->library('settutorial');
			$CI->settutorial->execute($t_id);
			
			redirect("./online_judge/submit/{$u_id}");
		}
	}
	class LinkProblem extends ProblemFile
	{
		function __construct(){
			parent::__construct();
		}
		function uploadfile($u_id)
		{
			$CI =& get_instance();
			
			$input_name = $_FILES['userfile']['name'][1];
			$input_size = $_FILES['userfile']['size'][1];
			$input_path = $_FILES['userfile']['tmp_name'][1];
			$output_name = $_FILES['userfile']['name'][2];
			$output_size = $_FILES['userfile']['size'][2];
			$output_path = $_FILES['userfile']['tmp_name'][2];

			if($this->check_input_output){
				$p_id = $this->upload_problem($u_id);
				$this->upload_input_output($p_id, $input_path, $output_path);

				$CI->load->library('setproblem');
				$CI->setproblem->execute($p_id);

				redirect("./online_judge/submit/{$u_id}");
			}
			else{
				$query = "select u_name from user where u_id = '{$u_id}';";
				$result = $CI->db->query($query);
				$result = $result->row_array();
				$data['u_name'] = $result['u_name'];
				$data['u_id'] = $u_id;
				$error_message = $CI->decorator->decorate_error_invalid();
				$data['error_problem'] = $error_message;
				$data['error_tutorial'] = '';
				$data['error_solution'] = '';
				$data['u_id'] = $u_id;
				$CI->load->view('submit', $data);	
			}
		}
		function upload_problem($u_id){
			$query = "insert into problem(p_type, p_name, p_given_name, u_id, p_format) values('{$CI->input->post('type')}', '{$CI->input->post('link')}', '{$CI->input->post('name')}', '{$u_id}', 'link');";
			$CI->db->query($query);
			
			$query = "select max(p_id) as p_id from problem where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$p_id = $result['p_id'];

			return $p_id;
		}
	}
	
	class SolutionFile extends File
	{
		function uploadfile($u_id)
		{
			$CI =& get_instance();
			
			$CI->load->library('decorator');
			$CI->load->helper('url');
			$CI->load->database();
			$CI->load->model('site');
			
			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			
			$ext = end(explode('.',$_FILES['userfile']['name']));
			$ext = strtolower($ext);
			
			$query = 'select p_id from problem';
			$result = $CI->db->query($query);
			$result = $result->result_array();
			
			$params = array($result);
			$CI->load->library('iterator1', $params);
			$bool = $CI->iterator1->doesExist($CI->input->post('problem_id'));

			if($bool)
			{
				if($ext == 'c' || $ext == 'cpp')
				{
					$query = "insert into submission(u_id, p_id, result) values('{$u_id}', '{$CI->input->post('problem_id')}', 'judging');";
					$CI->db->query($query);
						
					$query = "select max(s_id) as s_id from submission where u_id = '{$u_id}';";
					$result = $CI->db->query($query);
					$result = $result->row_array();
					$s_id = $result['s_id'];
					$s_name = $s_id.'.'.$ext;
							
					$config['upload_path'] = './submissions/';
					$config['file_name'] = $s_name;
					$config['allowed_types'] = 'c|cpp';
					$config['max_size'] = '2048';
								
					$CI->load->library('upload', $config);
								
					if ( ! $CI->upload->do_upload())
					{
						$error_message = $CI->decorator->decorate_error_large();
						$data['error_problem'] = '';
						$data['error_tutorial'] = '';
						$data['error_solution'] = $error_message;
						$data['u_id'] = $u_id;
						$CI->load->view('submit', $data);
					}
					else
					{
						$params = array($ext);
						$CI->load->library('strategy', $params);
						$CI->strategy->compile($u_id, $s_id, $s_name, $CI->input->post('problem_id'));
						redirect("./online_judge/submit/{$u_id}");
					}
				}
				else
				{
					$error_message = $CI->decorator->decorate_error_invalid();
					$data['error_problem'] = '';
					$data['error_tutorial'] = '';
					$data['error_solution'] = $error_message;
					$data['u_id'] = $u_id;
					$CI->load->view('submit', $data);
				}
			}
			else
			{
				$error_message = $CI->decorator->decorate_error_unavailable();
				$data['error_problem'] = '';
				$data['error_tutorial'] = '';
				$data['error_solution'] = $error_message;
				$data['u_id'] = $u_id;
				$CI->load->view('submit', $data);
			}
		}
	}

?>