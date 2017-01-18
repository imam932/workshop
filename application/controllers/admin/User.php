<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title']         = "Users";
    $data['desc']		       = "Admin Users";
    $data['breadcrumb']    = array('Dashboard', 'User');
    $data['content']       = $this->load->view('admin/user', array(), TRUE);

    $this->load->view('admin/template', $data);
  }

public function newUser(){
  $data['title']          = "Users";
  $data['desc']		        = "New User";
  $data['breadcrumb']     = array('Dashboard', 'User', 'New');
  $data['content']        = $this->load->view('admin/user_new', array(), TRUE);

  $this->load->view('admin/template', $data);
}
}
