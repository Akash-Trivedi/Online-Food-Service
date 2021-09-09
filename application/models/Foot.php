<?php
class Foot extends CI_Model{
  public function getLinks(){
    $links = array(
      'aboutgametoh'=>array(),
      'forfoodies'=>array(),
      'forrestaurants'=>array()
    );
    
    $this->load->database();
    $result= $this->db->query("SELECT * FROM aboutus WHERE 1");

    foreach ($result->result_array() as $row) {
      array_push($links['aboutgametoh'], array('name'=>$row['name'], 'link'=>$row['link']));
    }

    $result= $this->db->query("SELECT * FROM forfoodies WHERE 1");

    foreach ($result->result_array() as $row) {
      array_push($links['forfoodies'], array('name'=>$row['name'], 'link'=>$row['link']));
    }

    $result= $this->db->query("SELECT * FROM forrestaurants WHERE 1");

    foreach ($result->result_array() as $row) {
      array_push($links['forrestaurants'], array('name'=>$row['name'], 'link'=>$row['link']));
    }

    return $links;
  }
} ?>
