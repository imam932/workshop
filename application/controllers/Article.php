<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_article'));
  }

  function index()
  {
    $data['content'] = $this->load->view('article', array(), TRUE);
    $data['title'] = "Article";
    $data['desc'] = "Article, News, Event, etc";
    $data['breadcrumb'] = array('Home', 'Article');

    $this->load->view('template', $data);
  }

}

?>