<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_privilege extends CI_Model
{
  var $table = "privilege";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all($id_level)
  {
    $this->db->where('id_level', $id_level);
    $this->db->join('module', 'privilege.id_module = module.id_module');
    $this->db->order_by('module.id_module', 'asc');
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

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function reset($id_level)
  {
    $this->db->where('id_level', $id_level);
    $this->db->delete($this->table);
  }
}
