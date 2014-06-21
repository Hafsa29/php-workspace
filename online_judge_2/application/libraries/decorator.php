<?php
	class MessageGenerator{
		function error_large(){
			return 'File is too large!';
		}
		function error_small(){
			return 'File is too small!';
		}
		function error_invalid(){
			return 'File type is invalid!';
		}
		function error_unavailable(){
			return 'File is unavailable!';
		}
	}
	class Decorator extends MessageGenerator{
		function decorate_error_large(){
			$str = parent::error_large();
			return '<span class="errors">'.$str.'</span>';
		}
		function decorate_error_small(){
			$str = parent::error_small();
			return '<span class="errors">'.$str.'</span>';
		}
		function decorate_error_invalid(){
			$str = parent::error_invalid();
			return '<span class="errors">'.$str.'</span>';
		}
		function decorate_error_unavailable(){
			$str = parent::error_unavailable();
			return '<span class="errors">'.$str.'</span>';
		}
	}
?>