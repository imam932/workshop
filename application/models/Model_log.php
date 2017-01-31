<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_log extends CI_Model
{

  var $table = "log";

  public function __construct()
  {
    parent::__construct();
  }

  public function select_all($year = NULL)
  {
    $this->db->order_by("date");

    if(!is_null($year))
    {
      $this->db->where("DATE_FORMAT(date, '%Y') = ", $year);
    }

    $query = $this->db->get($this->table);

    return $query;
  }

  public function select_daily($hour = null)
  {
    $this->db->order_by("date");
    $this->db->where('DATE(date)', 'CURDATE()', FALSE);

    if(!is_null($hour))
    {
      $this->db->where("DATE_FORMAT(date, '%H') = ", $hour);
    }

    $query = $this->db->get($this->table);

    return $query;
  }

  public function select_monthly($date = NULL)
  {
    $this->db->order_by("date");
    $this->db->where("DATE_FORMAT(date, '%Y-%m') = ", "DATE_FORMAT(NOW(), '%Y-%m')", FALSE);

    if(!is_null($date))
    {
      $this->db->where("DATE_FORMAT(date, '%d') = ", $date);
    }

    $query = $this->db->get($this->table);

    return $query;
  }

  public function select_yearly($month = NULL)
  {
    $this->db->order_by("date");
    $this->db->where("DATE_FORMAT(date, '%Y') = ", "DATE_FORMAT(NOW(), '%Y')", FALSE);

    if(!is_null($month))
    {
      $this->db->where("DATE_FORMAT(date, '%M') = ", $month);
    }

    $query = $this->db->get($this->table);

    return $query;
  }

  public function select_where($field, $value)
  {
    $this->db->order_by("date");
    $this->db->where($field, $value);
    $query = $this->db->get($this->table);

    return $query;
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function clear()
  {
    $this->db->delete($this->table);
  }
}