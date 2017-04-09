<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends User_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_gallery');
  }

  function index()
  {
    $data['gallery'] = $this->Model_gallery->select_all();
    $this->render['content'] = $this->load->view('gallery', $data, TRUE);

    $this->render['title'] = 'Galeri';
    $this->render['desc'] = 'Kumpulan galeri WRI';
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Galeri', 'url' => ""]
    );

    $this->load->view('template', $this->render);
  }

}
?>
