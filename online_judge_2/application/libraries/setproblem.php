<?php include 'command.php';?>
<?php
	class SetProblem extends Command{
		public function __construct(){
			parent::__construct();
		}
		function execute($d_id){
			$CI = &get_instance();
			$d_name = $CI->input->post('name');
			$this->comd->set_problem($d_id, $d_name);
		}
	}
?>