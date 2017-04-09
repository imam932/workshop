<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->render['content'] = $this->load->view('admin/tutorial/index', array(), TRUE);

    // load template
    $this->render['title'] = "Tutorial";
    $this->render['desc'] = "Create or Manage Tutorial";
    $this->render['breadcrumb'] = array('Dashboard', 'Tutorial');

    $this->load->view('admin/template', $this->render);
  }
}

?>
