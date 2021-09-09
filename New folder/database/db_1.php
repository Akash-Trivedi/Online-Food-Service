<?php
class Connect_db{
  private $_server_name;
  private $_server_id;
  private $_server_password;
  private $_db_name;
  public $conobj;
  private $_db_obj;
  
  function __construct($server_name="localhost", $server_id="root", $server_password=""){
    $this->_server_name=$server_name;
    $this->_server_id=$server_id;
    $this->_server_password=$server_password;
  }
  function connect($db_name){
    $this->_db_name=$db_name;
    $this->conobj=mysqli_connect($this->_server_name, $this->_server_id, $this->_server_password);//server connection
    if(!$this->conobj){
      die("Server cannot be Connected at the Moment");
    } else{
      if (!mysqli_select_db($this->conobj, $this->_db_name)){
        die("Database cannot be Connected at the Moment");
      }
    }
  }
}
?>
