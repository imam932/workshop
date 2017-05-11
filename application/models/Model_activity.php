<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_activity extends CI_Model
{

  var $table = "activity";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all()
  {
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
    $this->db->where('id_activity', $id);
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

  public function update($data, $id)
  {
    $this->db->where('id_activity', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_activity', $id);
    $this->db->delete($this->table);
  }

  public function num_rows()
  {
    $query = $this->db->get($this->table);
    return $query->num_rows();
  }
}
