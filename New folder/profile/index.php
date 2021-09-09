<?php
  session_start();
  const TITLE="Profile";
  include("../head.php");

  class LoadUser{

    public $value=array();
    private $keys=array();

    function __construct($contact){
      global $dbobj;
      $query="SELECT * FROM customers WHERE contact='$contact'";
      $result_query=mysqli_query($dbobj->conobj, $query);
      $row_num=mysqli_fetch_array($result_query, MYSQLI_NUM);//after this the array gets destroyed or over written. So again execute query.
      $result_query=mysqli_query($dbobj->conobj, $query);
      $row_assoc=mysqli_fetch_array($result_query, MYSQLI_ASSOC);
      $this->keys=array_keys($row_assoc);

      for ($i=0; $i < count($this->keys) ; $i++) {
        array_push($this->value, $row_num[$i]);
      }
    }

    function update($contact){
      global $dbobj;
      for ($i=0; $i < count($this->keys) ; $i++) {
        array_push($this->value, $this->value[$i]);
      }
      $query="UPDATE customers SET city='Kanpur',  bio='Short coder' WHERE contact='$contact'";
      $result_query=mysqli_query($dbobj->conobj, $query);
    }

  }
  $user=new LoadUser($_SESSION['contact']);
  $user->update($_SESSION['contact']);
?>
<p>Here goes the html code.</p>
<?php
  include("../foot.php");
?>
