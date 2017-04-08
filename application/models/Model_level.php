<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_level extends CI_Model
{

  var $table = "level";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all()
  {
    $this->db->order_by('level');
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
    $this->db->where('id_level', $id);
    $query = $this->db->get($this->table);

    if($query->num_rows() == 1)
    {
      return $query->row();
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

  public function update($data, $id)
  {
    $this->db->where('id_level', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_level', $id);
    $this->db->delete($this->table);
  }

  public function num_rows()
  {
    $query = $this->db->get($this->table);
    return $query->num_rows();
  }
}
