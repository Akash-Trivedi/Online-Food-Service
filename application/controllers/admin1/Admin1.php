<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin1 extends CI_Controller{
  public function index($message=''){
    $arg=array('message'=>array('message'=>$message));
    $this->load->view('admin1/index', $arg);
  }

  public function verifyAdminLogin(){
    if(isset($_POST['login'])){
      if(!empty($_POST['usrnm']) && !empty($_POST['pswd'])){
        $usrnm=$_POST['usrnm'];
        $pswd=$_POST['pswd'];
        $this->load->database();
        $result= $this->db->query("SELECT * FROM credentials WHERE adminName='$usrnm' AND passkey='$pswd'");
        if($result->num_rows()>=1){
          // $_SESSION['admin']=$_POST['admin'];
          redirect('admin1/Dashboard');
        } else{
          redirect('admin1/Admin1');
        }
      } else{
        redirect('admin1/Admin1/index', "username/password cannot be empty");
      }
    } else{
      unset($_POST['admin']);
      unset($_POST['pswd']);
      echo "asdassd";
    }
  }
} ?>
