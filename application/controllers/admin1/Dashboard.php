<?php
class Dashboard extends CI_Controller{
  public function index(){
    $this->load->view('admin1/dashboard');
  }
  public function logout(){
    // TODO: destroy session
    redirect('admin1/Admin1');
  }

  public function divert($page=''){
  		$this->load->view('admin1/dashboard');
  		$this->load->view('admin1/'.$_POST['page']);
  }
} ?>
