<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

    //load template
    $data['title'] = "Contact Us";
    $data['desc'] = "Contact , info";
    $data['breadcrumb'] = array('Home','Contact');
    $data['content'] = $this->load->view('contact', array(), TRUE);

    $this->load->view('template', $data);
  }

}
