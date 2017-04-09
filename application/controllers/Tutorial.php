<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends User_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    // load data
    $this->render['content'] = $this->load->view('tutorial', array(), TRUE);

    //load template
    $this->render['title'] = "Tutorial";
    $this->render['desc'] = "Kumpulan tutorial per divisi";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => ""]
    );

    $this->load->view('template', $this->render);
  }

}

?>
