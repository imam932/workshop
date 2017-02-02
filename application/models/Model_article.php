<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_article extends CI_Model
{
	var $table = "article";

	public function __construct()
	{
		parent::__construct();
	}

	public function select_all($limit=null, $publish_only = FALSE)
	{
		$this->db->limit($limit);
		$this->db->order_by('date', 'DESC');
		$this->db->from($this->table);
		$this->db->join('category', 'article.id_category = category.id_category');
		$this->db->join('user', 'article.id_user = user.id_user');

		if($publish_only)
		{
			$this->db->where('article.publish', TRUE);
		}

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

	public function select_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->join('category', 'article.id_category = category.id_category');
		$this->db->join('user', 'article.id_user = user.id_user');
		$this->db->where('article.id_article', $id);

		$q = $this->db->get();

		if ($q->num_rows() == 1)
		{
			return $q->result();
		}
		else
		{
			return false;
		}
	}

	public function select_related($id_article, $id_category, $limit=null)
	{
		$this->db->limit($limit);
		$this->db->from($this->table);
		$this->db->join('category', 'article.id_category = category.id_category');
		$this->db->join('user', 'article.id_user = user.id_user');
		$this->db->where('article.id_category', $id_category);
		$this->db->where('article.id_article !=', $id_article);
		$this->db->where('article.publish', TRUE);
		$this->db->order_by('article.id_article', 'RANDOM');

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
		$this->db->where('id_article', $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id_article', $id);
		$this->db->delete($this->table);
	}
}

/* End of file Artikel_model.php */
/* Location: ./application/models/Artikel_model.php */

?>
