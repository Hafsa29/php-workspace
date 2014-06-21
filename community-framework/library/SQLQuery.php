<?php
 
class SQLQuery {
    protected $dbHandle;
    protected $result;

    function connect($address, $account, $pwd, $name) {
        $this->dbHandle = mysqli_connect($address, $account, $pwd, $name);
        if(mysqli_connect_errno()){
            return 0;
        } else{
            return 1;
        }
    }
     
    function disconnect() {
        if(!$this->dbHandle){
            mysqli_close($this->dbHandle);
        }
    }
 
    function query($query){
        $this->result = mysqli_query($this->dbHandle, $query);
    }

    function getResult(){
        $result = array();
        while($obj=mysqli_fetch_object($this->result)){
            array_push($result, $obj);
        }
        return $result;
    }

    function getRow(){
        return mysqli_fetch_object($this->result);
    }
 
    function getNumRows() {
        return mysqli_num_rows($this->result);
    }
 
    function freeResult() {
        mysqli_free_result($this->result);
    }
 
    function getError(){
        return mysqli_error_list($this->dbHandle);
    }

    function getLastID(){
        return mysqli_insert_id($this->dbHandle);
    }
}