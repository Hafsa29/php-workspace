<?php
require_once(ROOT . DS . 'library' . DS . 'SQLQuery.php');

class Model extends SQLQuery {
    protected $table;
 
    function __construct() {
 
        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $this->table = strtolower(get_class($this))."s";
    }
 
    function __destruct() {
    	$this->disconnect();
    }
}