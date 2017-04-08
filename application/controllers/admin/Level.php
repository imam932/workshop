<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends Admin_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_level');
    $this->load->model('Model_module');
    $this->load->model('Model_privilege');
    $this->load->model('Model_message');
  }

  function index(){
    //load data
    $data['level'] = $this->Model_level->select_all();
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
    $data['content'] = $this->load->view('admin/level/index', $data, TRUE);

    //load template
    $data['title'] = "Level";
    $data['desc']		= "User Level";
    $data['breadcrumb'] = array('Dashboard', 'Level');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function new()
  {
    // POST METHOD
    if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', form_error('level'));
        redirect('admin/Level/new', 'refresh');
      }
      else
      {
        // Insert Level
        $data['id_level'] = random_string('alnum', 5) . date('my') . random_string('alnum', 6);
        $data['level'] = $this->input->post('level');
        $this->Model_level->insert($data);

        // Insert Privilege
        $data2['id_level'] = $data['id_level'];
        foreach ($this->input->post('enabled_module') as $value) {
          $data2['id_module'] = $value;
          $this->Model_privilege->insert($data2);
        }

        $this->session->set_flashdata('message', 'Success ! Level has been added');
      }

      redirect('admin/Level', 'refresh');
    }

    // GET METHOD
    $data['module'] = $this->Model_module->select_all();
    //cek error
    if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    $data['content'] = $this->load->view('admin/level/new', $data, TRUE);
    $data['title'] = "Level";
    $data['desc']		= "Create New User Level";
    $data['breadcrumb'] = array('Dashboard', 'Level', 'New');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function edit($id)
  {
    // POST METHOD
    if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', form_error('level'));
        redirect('admin/Level/edit/' . $id, 'refresh');
      }
      else
      {
        // Update Level
        $data['level'] = $this->input->post('level');
        $this->Model_level->update($data, $id);

        // reset privilege
        $this->Model_privilege->reset($id);

        // Insert Privilege
        $data2['id_level'] = $id;
        foreach ($this->input->post('enabled_module') as $value) {
          $data2['id_module'] = $value;
          $this->Model_privilege->insert($data2);
        }

        $this->session->set_flashdata('message', 'Success ! Level has been edited');
      }

      redirect('admin/Level', 'refresh');
    }

    // GET METHOD
    $data['module'] = $this->Model_module->select_all();
    $data['level'] = $this->Model_level->select_by_id($id);
    $data['privilege'] = $this->Model_privilege->select_all($id);

    //cek error
    if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    $data['content'] = $this->load->view('admin/level/edit', $data, TRUE);
    $data['title'] = "Level";
    $data['desc']		= "Edit User Level";
    $data['breadcrumb'] = array('Dashboard', 'Level', 'Edit');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function delete($id)
  {
    $this->Model_level->delete($id);
    $this->session->set_flashdata('message', 'Success ! level has been deleted');
    redirect('admin/Level', 'refresh');
  }
}
