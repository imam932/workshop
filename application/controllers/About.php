<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends User_Controller{

  public function __construct(){
    parent::__construct();
  }

  function index(){
    // load data
    $this->render['content'] = $this->load->view('user/about/index', array(), TRUE);

    //load template
    $this->render['title'] = "Tentang Kami";
    $this->render['desc'] = "Penjelasan WRI";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tentang Kami', 'url' => ""],
    );

    $this->load->view('user/template', $this->render);
  }

}
