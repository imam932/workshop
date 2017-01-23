<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_gallery'));
  }

  function index()
  {
    $data['gallery'] = $this->Model_gallery->select_all();
    $data['content'] = $this->load->view('gallery', $data, TRUE);

    $data['title'] = 'Gallery';
    $data['desc'] = 'View Gallery';
    $data['breadcrumb'] = array('Home', 'Gallery');

    $this->load->view('template', $data);
  }

}

?>