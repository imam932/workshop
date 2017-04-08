<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_module extends CI_Model
{

  var $table = "module";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all()
  {
    $this->db->order_by('module');
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
}
