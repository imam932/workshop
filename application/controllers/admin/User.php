<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_user');
    $this->load->model('Model_auth');
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
    $this->load->view('admin/template', $data);
  }

  public function newUser()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
	    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('gender', 'Gender', 'required');
	    $this->form_validation->set_rules('birth', 'Birth', 'required');
      $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
      $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|numeric');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/User/New', 'refresh');
	    }
      else
      {
        $username_exist = $this->Model_auth->select_by_field('username', $this->input->post('username'));
        if($username_exist)
        {
          $this->session->set_flashdata('error', 'Username exist, use another');
          redirect('admin/User/New', 'refresh');
        }
        else
        {
          $data['id_user'] = random_string('alnum', 6) . date('dm') . random_string('alnum', 5);
          $data['name']    = $this->input->post('name');
          $data['gender']  = $this->input->post('gender');
          $data['birth']   = $this->input->post('birth');
          $data['address'] = $this->input->post('address');
          $data['phone']   = $this->input->post('phone');

          $this->Model_user->insert($data);

          $data1['id_auth']   = random_string('alnum', 6) . date('dm') . random_string('alnum', 5);
          $data1['username']  = $this->input->post('username');
          $data1['password']  = md5($this->input->post('password'));
          $data1['id_user']    = $data['id_user'];

          $this->Model_auth->insert($data1);

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
    $data['content']        = $this->load->view('admin/user_new', $data, TRUE);
    // load template
    $data['title']          = "Users";
    $data['desc']		        = "New User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'New');

    $this->load->view('admin/template', $data);
  }

  public function editUser($id){
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
				redirect('admin/User/editUser/' . $id, 'refresh');
	    }
      else
      {
        $data['name']    = $this->input->post('name');
        $data['gender']  = $this->input->post('gender');
        $data['birth']   = $this->input->post('birth');
        $data['address'] = $this->input->post('address');
        $data['phone']   = $this->input->post('phone');

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
    $data['user'] = $this->Model_user->select_by_id($id);
    // load page
    $data['content']        = $this->load->view('admin/user_edit', $data, TRUE);

    // load template
    $data['title']          = "Users";
    $data['desc']		        = "Edir User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'Edit');
    $this->load->view('admin/template', $data);
    // $data['user']  = $this->input->post('user');
  }

  public function deleteUser($id)
  {
    $this->Model_user->delete($id);
    $this->session->set_flashdata('message', 'Success ! User has been deleted');
    redirect('admin/User', 'refresh');
  }

  public function profile()
  {
    $id = $this->session->userdata('logged_in')['id_user'];
    // load data
    $data['user']  = $this->Model_user->select_by_id($id);
    // error handling
    if (!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    else if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load page
    $data['content']        = $this->load->view('admin/user_profile', $data, TRUE);

    // load template
    $data['title']          = "Users";
    $data['desc']		        = "Profile User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'Profile');
    $this->load->view('admin/template', $data);
  }

  public function resetPassword($id)
  {
    $this->form_validation->set_rules('old_password', 'Old Password', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Confirm Password', 'required');

    if(!$this->form_validation->run())
    {
      $this->session->set_flashdata('error', validation_errors());
    }
    else
    {
      $auth = $this->Model_auth->select_by_id($id);
      $old_password = md5($this->input->post('old_password'));
      $data['password'] = md5($this->input->post('password'));
      $password2 = md5($this->input->post('password2'));

      $message = array();
      if($old_password == $auth[0]->password)
      {
        if($data['password'] == $password2)
        {
          $this->Model_auth->update($data, $id);
          $this->session->set_flashdata('message', 'Success ! Your password has been reseted');
        }
        else
        {
          $this->session->set_flashdata('error', 'Confirmation password invalid');
        }
      }
      else
      {
        $this->session->set_flashdata('error', 'Your old password invalid');
      }
    }

    redirect('admin/User/profile');
  }
}
