<?php
function setReporting() {
    date_default_timezone_set("Asia/Dhaka");
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
 
function callHook() {
    global $url;
    global $default;

    if(!empty($url)){
        $urlArray = explode("/",$url);
        $controller = $urlArray[0];
        array_shift($urlArray);
        $action = $urlArray[0];
        array_shift($urlArray);
        $queryString = $urlArray;
    } else{
        $controller = $default['controller'];
        $action = $default['action'];
        $queryString = array();
    }
    $controller = ucwords($controller);
    $controller .= 'Controller';

    $dispatch = new $controller;

    if (method_exists($controller, $action)) {
        call_user_func_array(array($dispatch,$action), $queryString);
    } else {
        error_log("{$controller} has no method called {$action}!");
        die("{$controller} has no method called {$action}!");
    }
}

function __autoload($className) {
    if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
    } else if(file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.php')){
        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.php');
    } else {
        error_log("There is no such class called {$classname}!");
        die("There is no such class called {$classname}!");
    }
}

setReporting();
callHook();