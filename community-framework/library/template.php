<?php
class Template {
     
    protected $variables = array();
    protected $_view;
     
    function __construct($view) {
        $this->_view = $view;
    }
 
    function set($name,$value) {
        $this->variables[$name] = $value;
    }
     
    function render() {
        extract($this->variables);
        require_once(ROOT . DS . 'application' . DS . 'views' . DS . $this->_view . '.php');
    }
 
}