<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends User_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_article');
    $this->load->model('Model_gallery');
    $this->load->model('Model_division');
    $this->load->model('Model_activity');
  }

  function index()
  {
    // load data
    $data['article']          = $this->Model_article->select_all(8, TRUE);
    $data['gallery']          = $this->Model_gallery->select_all(5);
    $data['division']          = $this->Model_division->select_all();
    $data['activity']          = $this->Model_activity->select_all();

    $this->render['content']   = $this->load->view('user/home/index', $data, TRUE);
    $this->render['title'] = "Home";
    $this->render['desc'] = "desc";
    $this->render['breadcrumb'] = array("Home");
    $this->render['home'] = true;
    $this->load->view('user/template', $this->render);
  }

}
