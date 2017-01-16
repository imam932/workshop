<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index(){
    $data['title'] = "Category";
    $data['desc']		= "Category Articles";
    $data['breadcrumb'] = array('Dashboard', 'Category');
    $data['content'] = $this->load->view('admin/category', array(), TRUE);

    $this->load->view('admin/template', $data);
  }

  public function categorynew(){
    $data['title'] = "Category";
    $data['desc']		= "New Category Articles";
    $data['breadcrumb'] = array('Dashboard', 'Category', 'New');
    $data['content'] = $this->load->view('admin/category_new', array(), TRUE);

    $this->load->view('admin/template', $data);
  }
}
