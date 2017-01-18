<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_category');
  }

  function index(){
    //generate content
    $data['category'] = $this->Model_category->select_all();
    $data['content'] = $this->load->view('admin/category', $data, TRUE);

    $data['title'] = "Category";
    $data['desc']		= "Category Articles";
    $data['breadcrumb'] = array('Dashboard', 'Category');

    $this->load->view('admin/template', $data);
  }

  public function newCategory(){
    $data['id_category'] = random_string('alnum', 5) . date('my') . random_string('alnum', 6);
    $data['category'] = $this->input->post('category');
    $this->Model_category->insert($data);

    redirect('admin/Category', 'refresh');
  }

  public function deleteCategory($id){
    $this->Model_category->delete($id);

    redirect('admin/Category', 'refresh');
  }

  public function editCategory($id){
    $data['category'] = $this->input->post('category');
    $this->Model_category->update($data, $id);

    redirect('admin/Category', 'refresh');
  }

}
