<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends User_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_article', 'Model_category'));
  }

  function index()
  {
    // load data
    $data['category'] = $this->Model_category->select_all();
    $data['article'] = $this->Model_article->select_all(null, TRUE);
    $this->render['content'] = $this->load->view('user/article/index', $data, TRUE);

    //load template
    $this->render['title'] = "Artikel";
    $this->render['desc'] = "Kumpulan artikel, berita, tentang WRI";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Artikel', 'url' => ""]
    );

    $this->load->view('user/template', $this->render);
  }

  function view($id)
  {
    // load data
    $data['article'] = $this->Model_article->select_by_id($id);
    $id_category = $data['article'][0]->id_category;
    $data['related'] = $this->Model_article->select_related($id, $id_category, 4);
    $this->render['content'] = $this->load->view('user/article/view', $data, TRUE);

    //load template
    $title = $data['article'][0]->title;
    $this->render['title'] = "Artikel";
    $this->render['desc'] = "Kumpulan artikel, berita, tentang WRI";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Artikel', 'url' => base_url() . "Article"],
      ['label' => $title, 'url' => ""]
    );

    $this->load->view('user/template', $this->render);
  }

}

?>
