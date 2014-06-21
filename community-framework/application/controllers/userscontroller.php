<?php
require_once(ROOT . DS . 'library' . DS . 'controller.php');

class UsersController extends Controller{
	public function register(){
		$config = array(
			array(
				'field' => 'firstname',
				'label' => 'First Name',
				'rules' => 'required'
			), array(
				'field' => 'lastname',
				'label' => 'Last Name',
				'rules' => 'required'
			), array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|email'
			), array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			), array(
				'field' => 'confirm-password',
				'label' => 'Confirm Password',
				'rules' => 'required'
			)
		);
		$form = new Form($config);
		$errors = '';
		
		if(!$form->run()){
			$errors.=$form->getErrors();
		}
		if(strlen($_POST['password']) < 6){
			$errors.='Password is too short!<br>';	
		}
		
		if($_POST['password']!=$_POST['confirm-password']){
			$errors.="Password and confirm password doesn't match!<br>";		
		}
		
		$user = new User;
		
		if(!$user->unique_email($_POST['email'])){
			$errors.='Email is not unique!<br>';
		}

		if($errors == ''){
			$user->insert_user("{$_POST['firstname']} {$_POST['lastname']}", $_POST['email'], $_POST['password']);
			$id = $user->getLastID();
			$session = new Session;
			$session->set_flashdata('success', true);
			$session->set_flashdata('message', 'You have registered successfully, please check your email.');

			$url = new Url;
			$email_message = $url->site_url("users/verify_user/{$id}");
			mail($_POST['email'], 'Verification', $email_message);
		} else{
			$session = new Session;
			$session->set_flashdata('error', true);
			$session->set_flashdata('message', $errors);
		}
		$url = new Url;
		$url->redirect_back();
	}
	public function login(){
		$config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|email'
			), array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);
		$form = new Form($config);

		$errors = '';
		if(!$form->run()){
			$errors.=$form->getErrors();
		}

		$user = new User;
		if(!$user->check_email_and_password($_POST['email'], $_POST['password'])){
			$errors.="Email and Password doesn't match!<br";
		}

		if($errors == ''){
			$obj = $user->getRow();
			$session = new Session;
			$session->set_userdata('id', $obj->id);
			$session->set_userdata('logged_in', true);
			$session->set_flashdata('success', true);
			$session->set_flashdata('message', 'You have logged in successfully.');
			$url = new Url;
			$url->redirect('sites/home');

		} else{
			$session = new Session;
			$session->set_flashdata('error', true);
			$session->set_flashdata('message', $errors);
			$url->redirect_back();
		}
	}
	public function verify_user($id){
		$user = new User;
		$user->verify($id);
		$url = new Url;
		$url->redirect('sites/home');		
	}
	public function ranklist(){
		$this->setView('ranklist');
	}

	public function logout(){
		$session = new Session;
		$session->destroy();
		$url = new Url;
		$url->redirect();
	}
}