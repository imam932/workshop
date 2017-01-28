<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_category');
    $this->load->model('Model_message');
  }

  function index(){
    //load data
    $data['category'] = $this->Model_category->select_all();
    //cek error
    if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    else if(!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    //load page
    $data['content'] = $this->load->view('admin/category', $data, TRUE);

    //load template
    $data['title'] = "Category";
    $data['desc']		= "Category Articles";
    $data['breadcrumb'] = array('Dashboard', 'Category');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $this->load->view('admin/template', $data);
  }

  public function newCategory(){

    //form validation
    $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

    if(!$this->form_validation->run())
    {
      $this->session->set_flashdata('error', form_error('category'));
    }
    else
    {
      $data['id_category'] = random_string('alnum', 5) . date('my') . random_string('alnum', 6);
      $data['category'] = $this->input->post('category');
      $this->Model_category->insert($data);

      $this->session->set_flashdata('message', 'Success ! Category has been added');
    }

    redirect('admin/Category', 'refresh');
  }

  public function deleteCategory($id)
  {
    $this->Model_category->delete($id);
    $this->session->set_flashdata('message', 'Success ! Category has been deleted');
    redirect('admin/Category', 'refresh');
  }

  public function editCategory($id)
  {
    //form validation
    $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

    if(!$this->form_validation->run())
    {
      $this->session->set_flashdata('error', form_error('category'));
    }
    else
    {
      $data['category'] = $this->input->post('category');
      $this->Model_category->update($data, $id);

      $this->session->set_flashdata('message', 'Success ! Category has been edited');
    }

    redirect('admin/Category', 'refresh');
  }

}
