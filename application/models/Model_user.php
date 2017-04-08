<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model
{

  var $table = "user";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all()
  {
    $this->db->join('level', 'user.id_level = level.id_level');
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
    $this->db->join('level', 'user.id_level = level.id_level');
    $this->db->where('id_user', $id);
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

  public function select_by_field($field, $value)
  {
    $this->db->where($field, $value);
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
    $this->db->where('id_user', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete($this->table);
  }
}
