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
    $this->render['content'] = $this->load->view('user/tutorial/playlist', array(), TRUE);

    //load template
    $this->render['title'] = "Tutorial";
    $this->render['desc'] = "Kumpulan tutorial per divisi";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => base_url() . "Tutorial"],
      ['label' => 'Playlist', 'url' => ""],
    );
    $this->load->view('user/template', $this->render);
  }

  function videos()
  {
    // load data
    $this->render['content'] = $this->load->view('user/tutorial/videos', array(), TRUE);

    //load template
    $this->render['title'] = "Tutorial";
    $this->render['desc'] = "Kumpulan video tutorial";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => base_url() . "Tutorial"],
      ['label' => 'Videos', 'url' => ""]
    );

    $this->load->view('user/template', $this->render);
  }

  function playlist()
  {
    // load data
    $this->render['content'] = $this->load->view('user/tutorial/playlist', array(), TRUE);

    //load template
    $this->render['title'] = "Tutorial";
    $this->render['desc'] = "Kumpulan  Playlist";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => base_url() . "Tutorial"],
      ['label' => 'Playlist', 'url' => ""]
    );

    $this->load->view('user/template', $this->render);
  }

  function viewPlaylist($id)
  {
    // load data
    $data['playlistId'] = $id;
    $this->render['content'] = $this->load->view('user/tutorial/viewPlaylist', $data, TRUE);

    //load template
    $this->render['title'] = "Tutorial";
    $this->render['desc'] = "Kumpulan  Playlist";
    $this->render['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Tutorial', 'url' => base_url() . "Tutorial"],
      ['label' => 'Playlist', 'url' => base_url() . "Tutorial/playlist"],
      ['label' => 'Lihat Playlist', 'url' => ""]
    );

    $this->load->view('user/template', $this->render);
  }
}

?>
