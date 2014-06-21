<?php
require_once(ROOT . DS . 'library' . DS . 'model.php');

class User extends Model{
	public function check_email_and_password($email, $password){
		$encrypt = new Encrypt;
		$password = $encrypt->encode($password);
		$query = "select id from users where email = '{$email}' and password = '{$password}' and verified = 'true';";
		$this->query($query);
		$num = $this->getNumRows();
		if($num > 0){
			return true;
		} else{
			return false;
		}
	}

	public function unique_email($email){
		$query = "select count(1) as num from users where email = '{$email}';";
		$this->query($query);
		$res = $this->getRow();
		if($res->num == '0'){
			return true;
		} else {
			return false;
		}
	}

	public function insert_user($name, $email, $password){
		$encrypt = new Encrypt;
		$password = $encrypt->encode($password);
		$query = "insert into users(name, email, password, verified) values('{$name}', '{$email}', '{$password}', 'false');";
		$this->query($query);
	}

	public function verify($id){
		$query = "update users set verified = 'true' where id = '{$id}';";
		$this->query($query);
	}
}