<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_category');
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
    // get old value
    $data['old'] = $this->session->flashdata('old');

    //load page
    $this->render['content'] = $this->load->view('admin/category/index', $data, TRUE);

    //load template
    $this->render['title'] = "Category";
    $this->render['desc']		= "Article Categories";
    $this->render['breadcrumb'] = array('Dashboard', 'Category');

    $this->load->view('admin/template', $this->render);
  }

  public function store()
  {
    //form validation
    $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

    if(!$this->form_validation->run())
    {
      $this->session->set_flashdata('error', form_error('category'));
      $this->session->set_flashdata('old', $this->getOldValue());
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

  public function delete($id)
  {
    $this->Model_category->delete($id);
    $this->session->set_flashdata('message', 'Success ! Category has been deleted');
    redirect('admin/Category', 'refresh');
  }

  public function edit($id)
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
