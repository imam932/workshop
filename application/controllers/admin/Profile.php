<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_user');
  }

  function index()
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
    $this->render['content']        = $this->load->view('admin/profile/index', $data, TRUE);

    // load template
    $this->render['title']          = "Profile";
    $this->render['desc']		        = "View your profile";
    $this->render['breadcrumb']     = array('Dashboard', 'Profile');

    $this->load->view('admin/template', $this->render);
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
      $auth = $this->Model_user->select_by_id($id);
      $old_password = md5($this->input->post('old_password'));
      $data['password'] = md5($this->input->post('password'));
      $password2 = md5($this->input->post('password2'));

      $message = array();
      if($old_password == $auth[0]->password)
      {
        if($data['password'] == $password2)
        {
          $this->Model_user->update($data, $id);
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

    redirect('admin/Profile');
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
				redirect('admin/Profile/edit/' . $id, 'refresh');
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
        redirect('admin/Profile', 'refresh');
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
    $data['content']        = $this->load->view('admin/profile/edit', $data, TRUE);

    // load template
    $this->render['title']          = "Profile";
    $this->render['desc']		        = "Edit your profile";
    $this->render['breadcrumb']     = array('Dashboard', 'Profile', 'Edit');

    $this->load->view('admin/template', $this->render);
  }
}
