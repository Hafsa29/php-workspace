<?php include 'command.php';?>
<?php
	class UnsetProblem extends Command{
		public function __construct(){
			parent::__construct();
		}
		function execute($d_id){
			$this->comd->unset_problem($d_id);
		}
	}
?>