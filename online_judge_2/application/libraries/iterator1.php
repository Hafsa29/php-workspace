<?php
	class Iterator1{
		
		private $obj;
		private $currentObj;
		
		function __construct($params){
			$this->obj = $params[0][0];
			$this->currentObj = 0;
		}
		function getSize(){
			return count($this->obj);
		}
		function currentValue(){
			$slice = array_slice($obj, $this->currentObj, 1);
			return $slice[$this->currentObj];
		}
		function nextValue(){
			$slice = array_slice($obj, ++$this->currentObj, 1);
			return $slice[$this->currentObj];
		}
		function prevValue(){
			$slice = array_slice($obj, --$this->currentObj, 1);
			return $slice[$this->currentObj];
		}
		function doesExist($value){
			$key = array_search($value, $this->obj);
			if($key == false){
				return false;
			}
			else{
				return true;
			}
		}
	}
?>	