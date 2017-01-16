<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gallery extends CI_Model
{

  $table = "gallery";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all()
  {
    $query = $this->db->get($table);

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
    $this->db->where('id_gallery', $id);
    $query = $this->db->get($table);

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
    $this->db->insert($table, $data);
  }

  public function update($data, $id)
  {
    $this->db->where('id_gallery', $id);
    $this->db->update($table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_gallery', $id);
    $this->db->delete($table);
  }
}
