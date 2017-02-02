<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tutorial extends CI_Model
{

  var $table = "tutorial";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all($limit=null, $publish_only = FALSE)
  {
    $this->db->limit($limit);
    $this->db->order_by('date', 'DESC');
		$this->db->from($this->table);
		$this->db->join('division', 'tutorial.id_division = division.id_division');
		$this->db->join('user', 'tutorial.id_user = user.id_user');

    if($publish_only)
    {
      $this->db->where('tutorial.publish', TRUE);
    }

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
		$this->db->join('division', 'tutorial.id_division = division.id_division');
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

  public function select_related($id_tutorial, $id_division, $limit=null)
	{
		$this->db->limit($limit);
		$this->db->from($this->table);
		$this->db->join('division', 'tutorial.id_division = division.id_division');
		$this->db->join('user', 'tutorial.id_user = user.id_user');
		$this->db->where('tutorial.id_division', $id_division);
		$this->db->where('tutorial.id_tutorial !=', $id_tutorial);
    $this->db->where('tutorial.publish', TRUE);
		$this->db->order_by('tutorial.id_tutorial', 'RANDOM');

		$q = $this->db->get();

		if ($q->num_rows() > 0)
		{
			return $q->result();
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
