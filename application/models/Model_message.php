<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_message extends CI_Model{

  var $table = "message";

  public function __construct(){
    parent::__construct();
  }

  public function select_all($limit=null){
    $this->db->select('*');
    $this->db->from($this->table);

    $q = $this->db->get();
    if($q->num_rows() > 0)
    {
      return $q->result();
    }
    else
    {
      return array();
    }
  }

  public function insert($data){
    $this->db->insert($this->table, $data);
  }
}
