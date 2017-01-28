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
    // load data
    $data['article'] = $this->Model_article->select_all();
    $data['content'] = $this->load->view('article', $data, TRUE);

    //load template
    $data['title'] = "Article";
    $data['desc'] = "Article, News, Event, etc";
    $data['breadcrumb'] = array('Home', 'Article');

    $this->load->view('template', $data);
  }

  function view($id)
  {
    // load data
    $data['article'] = $this->Model_article->select_by_id($id);
    $data['content'] = $this->load->view('article_view', $data, TRUE);

    //load template
    $title = $data['article'][0]->title;
    $data['title'] = "Article";
    $data['desc'] = "Article, News, Event, etc";
    $data['breadcrumb'] = array('Home', 'Article', $title);

    $this->load->view('template', $data);
  }

}

?>