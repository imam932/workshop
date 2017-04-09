<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends User_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_article');
  }

  function index()
  {
    // load data
    $data['content'] = $this->load->view('tutorial', array(), TRUE);

    //load template
    $data['title'] = "Tutorial";
    $data['desc'] = "Kumpulan tutorial per divisi";
    $data['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => ""]
    );
    $data['article_footer']   = $this->Model_article->select_all(4);

    $this->load->view('template', $data);
  }

}

?>
