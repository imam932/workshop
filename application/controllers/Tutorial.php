<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_tutorial', 'Model_division'));
  }

  function index()
  {
    // load data
    $data['division'] = $this->Model_division->select_all();
    $data['tutorial'] = $this->Model_tutorial->select_all();
    $data['content'] = $this->load->view('tutorial', $data, TRUE);

    //load template
    $data['title'] = "Tutorial";
    $data['desc'] = "Tutorial of each division";
    $data['breadcrumb'] = array('Home', 'Tutorial');

    $this->load->view('template', $data);
  }

  function view($id)
  {
    // load data
    $data['tutorial'] = $this->Model_tutorial->select_by_id($id);
    $data['content'] = $this->load->view('tutorial_view', $data, TRUE);

    //load template
    $title = $data['tutorial'][0]->title;
    $data['title'] = "tutorial";
    $data['desc'] = "Tutorial of each division";
    $data['breadcrumb'] = array('Home', 'Tutorial', $title);

    $this->load->view('template', $data);
  }

}

?>