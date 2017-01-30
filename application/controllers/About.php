<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends User_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_article');
  }

  function index(){
    $data['article_footer']   = $this->Model_article->select_all(4);
    // load data
    $data['content'] = $this->load->view('about', $data, TRUE);

    //load template
    $data['title'] = "About Us";
    $data['desc'] = "About , info";
    $data['breadcrumb'] = array('Home','About');

    $this->load->view('template', $data);
  }

}
