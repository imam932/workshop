<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends User_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_tutorial', 'Model_division', 'Model_article'));
  }

  function index()
  {
    // load data
    $data['division'] = $this->Model_division->select_all();
    $data['tutorial'] = $this->Model_tutorial->select_all(null, TRUE);
    $data['content'] = $this->load->view('tutorial', $data, TRUE);

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

  function view($id)
  {
    // load data
    $data['tutorial'] = $this->Model_tutorial->select_by_id($id);
    $id_division = $data['tutorial'][0]->id_division;
    $data['related'] = $this->Model_tutorial->select_related($id, $id_division, 4);
    $data['content'] = $this->load->view('tutorial_view', $data, TRUE);

    //load template
    $title = $data['tutorial'][0]->title;
    $data['title'] = "Tutorial";
    $data['desc'] = "Kumpulan tutorial per divisi";
    $data['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => base_url() . "Tutorial"],
      ['label' => $title, 'url' => ""]
    );
    
    $data['article_footer']   = $this->Model_article->select_all(4);

    $this->load->view('template', $data);
  }

}

?>