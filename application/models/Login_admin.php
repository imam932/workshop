<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Model 
{
	public function login($data)
	{
		$condition = "username = '" . $data['username'] . "' AND password = '" . $data['password'] . "'";
		$this->db->select("*");
		$this->db->from("autentikasi");
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}	

	public function read_user_information($id_user)
	{
		$condition = "id_user = '" . $id_user . "'";
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}

/* End of file login_admin.php */
/* Location: ./application/models/login_admin.php */

?>