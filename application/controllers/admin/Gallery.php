<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Admin_Controller{

  public function __construct(){
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index(){
    $data['title']         = "Gallery";
    $data['desc']		       = "Gallery Event WRI";
    $data['breadcrumb']    = array('Dashboard', 'Gallery');
    $data['content']       = $this->load->view('admin/gallery', array(), TRUE);

    $this->load->view('admin/template', $data);
  }

}
