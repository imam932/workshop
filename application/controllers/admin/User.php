<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_user');
    $this->load->model('Model_level');
  }

  function index()
  {
    // load data
    $data['user']          = $this->Model_user->select_all();
    $data['message'] = $this->session->flashdata('message');

    // load content
    $this->render['content']       = $this->load->view('admin/user/index', $data, TRUE);
    // load template
    $this->render['title']         = "Users";
    $this->render['desc']		       = "Admin Users";
    $this->render['breadcrumb']    = array('Dashboard', 'User');

    $this->load->view('admin/template', $this->render);
  }

  public function store()
  {
    if ($this->input->post())
    {
      //form validation
	    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('gender', 'Gender', 'required');
	    $this->form_validation->set_rules('birth', 'Birth', 'required');
	    $this->form_validation->set_rules('id_level', 'Level', 'required');
      $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
      $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|numeric');

	    if($this->form_validation->run())
      {
        $username_exist = $this->Model_user->select_by_field('username', $this->input->post('username'));

        if($username_exist)
        {
          $this->session->set_flashdata('username_error', 'Username exist, use another');
        }
        else
        {
          $data['id_user'] = random_string('alnum', 6) . date('dm') . random_string('alnum', 5);
          $data['name']    = $this->input->post('name');
          $data['gender']  = $this->input->post('gender');
          $data['birth']   = $this->input->post('birth');
          $data['address'] = $this->input->post('address');
          $data['phone']   = $this->input->post('phone');
          $data['id_level'] = $this->input->post('id_level');
          $data['username']  = $this->input->post('username');
          $data['password']  = md5($this->input->post('password'));
          $this->Model_user->insert($data);

          $this->session->set_flashdata('message', 'Success ! User has been added');
          redirect('admin/User', 'refresh');
        }
      }
    }
    //error handling
    $data['username_error'] = $this->session->flashdata('username_error');

    // load content
    $data['level'] = $this->Model_level->select_all();
    $this->render['content']        = $this->load->view('admin/user/store', $data, TRUE);
    // load template
    $this->render['title']          = "Users";
    $this->render['desc']		        = "New User";
    $this->render['breadcrumb']     = array('Dashboard', 'User', 'New');

    $this->load->view('admin/template', $this->render);
  }

  public function edit($id)
  {
    if ($this->input->post())
    {
      //form validation
	    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('gender', 'Gender', 'required');
	    $this->form_validation->set_rules('birth', 'Birth', 'required');
      $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
      $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|numeric');

	    if($this->form_validation->run())
      {
        $data['name']    = $this->input->post('name');
        $data['gender']  = $this->input->post('gender');
        $data['birth']   = $this->input->post('birth');
        $data['address'] = $this->input->post('address');
        $data['phone']   = $this->input->post('phone');
        $data['id_level'] = $this->input->post('id_level');

        $this->Model_user->update($data, $id);
        $this->session->set_flashdata('message', 'Success ! User has been edited');
        redirect('admin/User', 'refresh');
      }
    }

    // load data
    $data['level'] = $this->Model_level->select_all();
    $data['user'] = $this->Model_user->select_by_id($id);
    // load page
    $this->render['content']        = $this->load->view('admin/user/edit', $data, TRUE);

    // load template
    $this->render['title']          = "Users";
    $this->render['desc']		        = "Edir User";
    $this->render['breadcrumb']     = array('Dashboard', 'User', 'Edit');

    $this->load->view('admin/template', $this->render);
  }

  public function delete($id)
  {
    $this->Model_user->delete($id);
    $this->session->set_flashdata('message', 'Success ! User has been deleted');
    redirect('admin/User', 'refresh');
  }
}
