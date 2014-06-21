<?php include 'command.php';?>
<?php
	class SetTutorial extends Command{
		public function __construct(){
			parent::__construct();
		}
		function execute($d_id){
			$CI = &get_instance();
			$d_name = $CI->input->post('name');
			$this->comd->set_tutorial($d_id, $d_name);
		}
	}
?>