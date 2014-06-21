<?php
	class Strategy{
		private $filetype;
		private $strategy;
		function __construct($params){
			$this->filetype = $params[0];
		}
		function compile($u_id, $s_id, $s_name, $p_id){
			switch($this->filetype){
				case 'c':
					$this->strategy = new StrategyForC();
					break;
				case 'cpp':
					$this->strategy = new StrategyForCpp();
					break;
				case 'java':
					$this->strategy = new StrategyForJava();
					break;
				case 'python':
					$this->strategy = new StrategyForPython();
					break;
			}
			$this->strategy->compile($u_id, $s_id, $s_name, $p_id);
		}
	}
	abstract class AbstractStrategy{
		abstract function compile($u_id, $s_id, $s_name, $p_id);
	}
	class StrategyForC extends AbstractStrategy{
		function compile($u_id, $s_id, $s_name, $p_id){
			$CI =& get_instance();
			$CI->load->database(); 
			$command = "gcc submissions\\{$s_name} -o submissions\\{$s_id}";
			system($command);
			$command = "submissions\\{$s_id} < inputs\\{$p_id}.txt > outputs\\{$s_id}.txt";
			system($command);
			$c1 = file_get_contents("outputs\\{$p_id}.txt");
			$c2 = file_get_contents("outputs\\{$s_id}.txt");
			
			if($c1==$c2)
			{
				$query = "update submission set result = 'AC' where s_id = '{$s_id}';";
			}
			else
			{
				$query = "update submission set result = 'WA' where s_id = '{$s_id}';";
			}
			$CI->db->query($query);		
		}
	}
	class StrategyForCpp extends AbstractStrategy{
		function compile($u_id, $s_id, $s_name, $p_id){
			$CI =& get_instance();
			$CI->load->database(); 
			$command = "gcc submissions\\{$s_name} -o submissions\\{$s_id}";
			system($command);
			$command = "submissions\\{$s_id} < inputs\\{$p_id}.txt > outputs\\{$s_id}.txt";
			system($command);
			$c1 = file_get_contents("outputs\\{$p_id}.txt");
			$c2 = file_get_contents("outputs\\{$s_id}.txt");
			
			if($c1==$c2)
			{
				$query = "update submission set result = 'AC' where s_id = '{$s_id}';";
			}
			else
			{
				$query = "update submission set result = 'WA' where s_id = '{$s_id}';";
			}
			$CI->db->query($query);		
		}
	}
	class StrategyForJava extends AbstractStrategy{
		function compile($u_id, $s_id, $s_name, $p_id){

		}
	}
	class StrategyForPython extends AbstractStrategy{
		function compile($u_id, $s_id, $s_name, $p_id){
			
		}	
	}
?>