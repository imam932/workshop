<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends User_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_article');
    $this->load->model('Model_gallery');
    $this->load->model('Model_tutorial');
  }

  function index()
  {
    // load data
    $data['article']          = $this->Model_article->select_all(8);
    $data['gallery']          = $this->Model_gallery->select_all(5);
    $data['tutorial']         = $this->Model_tutorial->select_all(8);
    $data['article_footer']   = $this->Model_article->select_all(4);

    $data['content']   = $this->load->view('home', $data, TRUE);
    $data['title'] = "Home";
    $data['desc'] = "desc";
    $data['breadcrumb'] = array("Home");
    $data['home'] = true;
    $this->load->view('template', $data);
  }

}
