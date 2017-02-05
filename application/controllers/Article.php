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
    $data['content'] = $this->load->view('article', $data, TRUE);

    //load template
    $data['title'] = "Artikel";
    $data['desc'] = "Kumpulan artikel, berita, tentang WRI";
    $data['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Artikel', 'url' => ""]
    );

    $data['article_footer']   = $this->Model_article->select_all(4);

    $this->load->view('template', $data);
  }

  function view($id)
  {
    // load data
    $data['article'] = $this->Model_article->select_by_id($id);
    $id_category = $data['article'][0]->id_category;
    $data['related'] = $this->Model_article->select_related($id, $id_category, 4);
    $data['content'] = $this->load->view('article_view', $data, TRUE);

    //load template
    $title = $data['article'][0]->title;
    $data['title'] = "Artikel";
    $data['desc'] = "Kumpulan artikel, berita, tentang WRI";
    $data['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Artikel', 'url' => base_url() . "Article"],
      ['label' => $title, 'url' => ""]
    );

    $data['article_footer']   = $this->Model_article->select_all(4);

    $this->load->view('template', $data);
  }

}

?>
