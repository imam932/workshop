<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_message');
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
    $this->load->view('admin/template', $data);
  }

  public function read($id)
  {
    $this->Model_message->read($id);
  }
}

?>
