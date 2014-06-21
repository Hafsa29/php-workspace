<?php
require_once(ROOT . DS . 'library' . DS . 'template.php');
class Controller {
    protected $_template;

    function setView($view){
        $this->_template = new Template($view);
    }
 
    function set($name,$value) {
        $this->_template->set($name,$value);
    }
 
    function __destruct(){
        if(!empty($this->_template)) $this->_template->render();
    }
         
}