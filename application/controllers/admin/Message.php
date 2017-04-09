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
    $this->render['content'] = $this->load->view('admin/message/index', $data, TRUE);

    // load template
    $this->render['title'] = "Message";
    $this->render['desc'] = "View incoming message";
    $this->render['breadcrumb'] = array('Dashboard', 'Message');

    $this->load->view('admin/template', $this->render);
  }

  public function read($id)
  {
    $this->Model_message->read($id);
  }
}

?>
