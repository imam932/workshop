<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_log'));
  }

  function index()
  {

  }

  function get_daily()
  {
    $data = $this->Model_log->select_daily()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      $time = new DateTime($row->date);

      if(!in_array($time->format("H"), $array_label))
      {
        array_push($array_label, $time->format("H"));
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_daily($row)->num_rows();
      array_push($array_data, array('meta' => 'Visitor', 'value' => $count));
    }

    // edit label to add :00
    for($i = 0; $i < sizeof($array_label); $i++)
    {
      $array_label[$i] = $array_label[$i] . ":00";
    }

    $array_return = array('labels' => $array_label, 'series' => [$array_data]);

    print(json_encode($array_return));
  }

  function get_monthly()
  {
    $data = $this->Model_log->select_monthly()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      $time = new DateTime($row->date);

      if(!in_array($time->format("d"), $array_label))
      {
        array_push($array_label, $time->format("d"));
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_monthly($row)->num_rows();
      array_push($array_data, array('meta' => 'Visitor', 'value' => $count));
    }

    // edit label to add month name
    for($i = 0; $i < sizeof($array_label); $i++)
    {
      $array_label[$i] = $array_label[$i] . " " . date("M");
    }

    $array_return = array('labels' => $array_label, 'series' => [$array_data]);

    print(json_encode($array_return));
  }

  function get_yearly()
  {
    $data = $this->Model_log->select_yearly()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      $time = new DateTime($row->date);

      if(!in_array($time->format("F"), $array_label))
      {
        array_push($array_label, $time->format("F"));
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_yearly($row)->num_rows();
      array_push($array_data, array('meta' => 'Visitor', 'value' => $count));
    }

    $array_return = array('labels' => $array_label, 'series' => [$array_data]);

    print(json_encode($array_return));
  }

  function get_all()
  {
    $data = $this->Model_log->select_all()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      $time = new DateTime($row->date);

      if(!in_array($time->format("Y"), $array_label))
      {
        array_push($array_label, $time->format("Y"));
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_all($row)->num_rows();
      array_push($array_data,  array('meta' => 'Visitor', 'value' => $count));
    }

    $array_return = array('labels' => $array_label, 'series' => [$array_data]);

    print(json_encode($array_return));
  }

  function get_browser()
  {
    $data = $this->Model_log->select_all()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      if(!in_array($row->browser, $array_label))
      {
        array_push($array_label, $row->browser);
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_where("browser", $row)->num_rows();
      array_push($array_data, array('meta' => $row, 'value' => $count));
    }

    $array_return = array('labels' => $array_label, 'series' => $array_data);

    print(json_encode($array_return));
  }

  function get_platform()
  {
    $data = $this->Model_log->select_all()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      if(!in_array($row->platform, $array_label))
      {
        array_push($array_label, $row->platform);
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_where("platform", $row)->num_rows();
      array_push($array_data, array('meta' => $row, 'value' => $count));
    }

    $array_return = array('labels' => $array_label, 'series' => $array_data);

    print(json_encode($array_return));
  }

  function get_location()
  {
    $data = $this->Model_log->select_all()->result();

    $array_label = array();

    foreach ($data as $row)
    {
      if(!in_array($row->location, $array_label))
      {
        array_push($array_label, $row->location);
      }
    }

    $array_data = array();

    foreach ($array_label as $row)
    {
      $count = $this->Model_log->select_where("location", $row)->num_rows();
      array_push($array_data, array('meta' => $row, 'value' => $count));
    }

    $array_return = array('labels' => $array_label, 'series' => [$array_data]);

    print(json_encode($array_return));
  }

}