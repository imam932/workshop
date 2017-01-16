<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data['title'] = "Tutorial";
    $data['desc'] = "Create or Manage Tutorial";
    $data['breadcrumb'] = array('Dashboard', 'Tutorial');
    $data['content'] = $this->load->view('admin/tutorial', array(), TRUE);

    $this->load->view('admin/template', $data);
  }

  function newTutorial()
  {
    $data['title'] = "Tutorial";
    $data['desc'] = "Create New Tutorial";
    $data['breadcrumb'] = array('Dashboard', 'Tutorial', 'New');
    $data['content'] = $this->load->view('admin/tutorial_new', array(), TRUE);

    $this->load->view('admin/template', $data);
  }
}

?>
