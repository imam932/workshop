<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tutorial extends CI_Model
{

  var $table = "tutorial";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all($limit=null)
  {
    $this->db->limit($limit);
    $this->db->order_by('date', 'DESC');
		$this->db->from($this->table);
		$this->db->join('category', 'tutorial.id_category = category.id_category');
		$this->db->join('user', 'tutorial.id_user = user.id_user');

    $query = $this->db->get();

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
    $this->db->from($this->table);
		$this->db->join('category', 'tutorial.id_category = category.id_category');
		$this->db->join('user', 'tutorial.id_user = user.id_user');
		$this->db->where('tutorial.id_tutorial', $id);

    $query = $this->db->get();

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
    $this->db->where('id_tutorial', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_tutorial', $id);
    $this->db->delete($this->table);
  }
}
