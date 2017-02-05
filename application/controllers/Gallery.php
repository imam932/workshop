<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends User_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_gallery', 'Model_article'));
  }

  function index()
  {
    $data['gallery'] = $this->Model_gallery->select_all();
    $data['content'] = $this->load->view('gallery', $data, TRUE);

    $data['title'] = 'Galeri';
    $data['desc'] = 'Kumpulan galeri WRI';
    $data['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Galeri', 'url' => ""]
    );
    $data['article_footer']   = $this->Model_article->select_all(4);

    $this->load->view('template', $data);
  }

}
?>
