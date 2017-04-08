<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_message');
    $this->load->model('Model_privilege');
  }

  public function index()
  {
    $data['content'] = $this->load->view('admin/tutorial/index', array(), TRUE);

    // load template
    $data['title'] = "Tutorial";
    $data['desc'] = "Create or Manage Tutorial";
    $data['breadcrumb'] = array('Dashboard', 'Tutorial');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }
}

?>
