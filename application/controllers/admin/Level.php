<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends Admin_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_level');
    $this->load->model('Model_module');
    $this->load->model('Model_privilege');
  }

  function index(){
    //load data
    $data['level'] = $this->Model_level->select_all();
    $data['message'] = $this->session->flashdata('message');

    //load page
    $this->render['content'] = $this->load->view('admin/level/index', $data, TRUE);

    //load template
    $this->render['title'] = "Level";
    $this->render['desc']		= "User Level";
    $this->render['breadcrumb'] = array('Dashboard', 'Level');

    $this->load->view('admin/template', $this->render);
  }

  public function store()
  {
    // POST METHOD
    if($this->input->post())
    {
      //form validation
      $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');

      if($this->form_validation->run())
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
        redirect('admin/Level', 'refresh');
      }
    }

    // GET METHOD
    $data['module'] = $this->Model_module->select_all();

    $this->render['content'] = $this->load->view('admin/level/store', $data, TRUE);
    $this->render['title'] = "Level";
    $this->render['desc']		= "Create New User Level";
    $this->render['breadcrumb'] = array('Dashboard', 'Level', 'New');

    $this->load->view('admin/template', $this->render);
  }

  public function edit($id)
  {
    // POST METHOD
    if($this->input->post())
    {
      //form validation
      $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');

      if($this->form_validation->run())
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
        redirect('admin/Level', 'refresh');
      }
    }

    // GET METHOD
    $data['module'] = $this->Model_module->select_all();
    $data['level'] = $this->Model_level->select_by_id($id);
    $data['privilege'] = $this->Model_privilege->select_all($id);

    $this->render['content'] = $this->load->view('admin/level/edit', $data, TRUE);
    $this->render['title'] = "Level";
    $this->render['desc']		= "Edit User Level";
    $this->render['breadcrumb'] = array('Dashboard', 'Level', 'Edit');

    $this->load->view('admin/template', $this->render);
  }

  public function delete($id)
  {
    $this->Model_level->delete($id);
    $this->session->set_flashdata('message', 'Success ! level has been deleted');
    redirect('admin/Level', 'refresh');
  }
}
