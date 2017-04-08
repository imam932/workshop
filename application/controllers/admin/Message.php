<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_message');
    $this->load->model('Model_privilege');
  }

  public function index()
  {
    // load data
    $data['message'] = $this->Model_message->select_all();
    //load page
    $data['content'] = $this->load->view('admin/message', $data, TRUE);

    // load template
    $data['title'] = "Message";
    $data['desc'] = "View incoming message";
    $data['breadcrumb'] = array('Dashboard', 'Message');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function read($id)
  {
    $this->Model_message->read($id);
  }
}

?>
