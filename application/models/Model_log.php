<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_log extends CI_Model
{

  var $table = "log";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all()
  {
    $this->db->order_by('log');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return array();
    }
  }

  public function select_by_id($id)
  {
    $this->db->where('id_log', $id);
    $query = $this->db->get($this->table);

    if($query->num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function clear()
  {
    $this->db->delete($this->table);
  }
}