<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    //generate content
    $this->load->model('Model_category');
    $data['category'] = $this->Model_category->select_all();
    $data['content'] = $this->load->view('admin/category', $data, TRUE);

    $data['title'] = "Category";
    $data['desc']		= "Category Articles";
    $data['breadcrumb'] = array('Dashboard', 'Category');

    $this->load->view('admin/template', $data);
  }

  public function newCategory()
  {
    $this->load->model('Model_category');

    $data['id_category'] = random_string('alnum', 9) . date('dmy');
    $data['category'] = $this->input->post('category');
    $this->Model_category->insert($data);

    redirect('admin/Category', 'refresh');
  }

  public function deleteCategory($id)
  {
    $this->load->model('Model_category');
    $this->Model_category->delete($id);

    redirect('admin/Category', 'refresh');
  }

  public function editCategory($id)
  {
    $this->load->model('Model_category');
    $data['category'] = $this->input->post('category');
    $this->Model_category->update($data, $id);

    redirect('admin/Category', 'refresh');
  }

}
