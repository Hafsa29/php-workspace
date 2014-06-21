<?php include 'command.php';?>
<?php
	class UnsetTutorial extends Command{
		public function __construct(){
			parent::__construct();
		}
		public function execute($d_id){
			$this->comd->unset_tutorial($d_id);
		}
	}
?>