<?php
class Search extends CI_Model{

  function searchItem($keywords=array()){
    $items= array('items'=>array());
    $this->load->database();
    $combinedFood= $keywords['combined'];
    $result= $this->db->query("
      SELECT * FROM menu NATURAL JOIN restaurants WHERE itemName='$combinedFood'");

    $items['items']= $result->result_array();
    return $items;
  }
} ?>
