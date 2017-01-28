<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_message extends CI_Model{

  var $table = "message";

  public function __construct(){
    parent::__construct();
  }

  public function select_all($limit=null){
    $this->db->select('*');
    $this->db->limit($limit);
    $this->db->from($this->table);
    $this->db->order_by('date', 'desc');

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

  public function read($id)
  {
    $data['readed'] = TRUE;
    $this->db->where('id_message', $id);
    $this->db->update($this->table, $data);
  }

  public function unread_num()
  {
    $this->db->where('readed', FALSE);
    $q = $this->db->get($this->table);
    return $q->num_rows();
  }
}