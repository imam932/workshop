<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_article extends CI_Model
{
	$table = "article";

	public function __construct()
	{
		parent::__construct();
	}

	public function select_all()
	{
		$q = $this->db->get($table);

		if($q->num_rows() > 0)
		{
			return $q->result();
		}
		else
		{
			return array();
		}
	}

	public function select_by_id($id)
	{
		$this->db->where('id_article', $id);

		$q = $this->db->get($table);

		if ($q->num_rows() == 1)
		{
			return $q->row();
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
		$this->db->where('id_article', $id);
		$this->db->update($table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id_article', $id);
		$this->db->delete($table);
	}
}

/* End of file Artikel_model.php */
/* Location: ./application/models/Artikel_model.php */

?>
