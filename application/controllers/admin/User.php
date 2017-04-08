<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_user');
    $this->load->model('Model_message');
    $this->load->model('Model_level');
    $this->load->model('Model_privilege');
  }

  function index()
  {
    // load data
    $data['user']          = $this->Model_user->select_all();
    //error handling
    if(!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    // load content
    $data['content']       = $this->load->view('admin/user', $data, TRUE);
    // load template
    $data['title']         = "Users";
    $data['desc']		       = "Admin Users";
    $data['breadcrumb']    = array('Dashboard', 'User');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function new()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
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

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/User/new', 'refresh');
	    }
      else
      {
        $username_exist = $this->Model_user->select_by_field('username', $this->input->post('username'));
        if($username_exist)
        {
          $this->session->set_flashdata('error', 'Username exist, use another');
          redirect('admin/User/new', 'refresh');
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
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load content
    $data['level'] = $this->Model_level->select_all();
    $data['content']        = $this->load->view('admin/user_new', $data, TRUE);
    // load template
    $data['title']          = "Users";
    $data['desc']		        = "New User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'New');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function edit($id)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
	    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('gender', 'Gender', 'required');
	    $this->form_validation->set_rules('birth', 'Birth', 'required');
      $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
      $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|numeric');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/User/edit/' . $id, 'refresh');
	    }
      else
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
    //error handling
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load data
    $data['level'] = $this->Model_level->select_all();
    $data['user'] = $this->Model_user->select_by_id($id);
    // load page
    $data['content']        = $this->load->view('admin/user_edit', $data, TRUE);

    // load template
    $data['title']          = "Users";
    $data['desc']		        = "Edir User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'Edit');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

    $this->load->view('admin/template', $data);
  }

  public function delete($id)
  {
    $this->Model_user->delete($id);
    $this->session->set_flashdata('message', 'Success ! User has been deleted');
    redirect('admin/User', 'refresh');
  }
}
