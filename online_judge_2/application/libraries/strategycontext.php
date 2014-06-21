<?php
	class StrategyContext{
		private $filetype;
		private $strategy;
		function __construct($filetype){
			$this->filetype = $filetype;
		}
		function compile($u_id, $s_id, $s_name, $p_id){
			switch($filetype){
				case 'C':
					$this->strategy = new StrategyForC();
					break;
				case 'CPP':
					$this->strategy = new StrategyForCpp();
					break;
				case 'JAVA':
					$this->strategy = new StrategyForJava();
					break;
				case 'PYTHON':
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

	}
	class StrategyForPython extends AbstractStrategy{
		
	}
?>