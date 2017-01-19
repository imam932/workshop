<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_user');
    $this->load->model('Model_auth');
  }

  function index(){
    $data['user']          = $this->Model_user->select_all();
    $data['title']         = "Users";
    $data['desc']		       = "Admin Users";
    $data['breadcrumb']    = array('Dashboard', 'User');
    $data['content']       = $this->load->view('admin/user', $data, TRUE);

    $this->load->view('admin/template', $data);
  }

  public function newUser(){
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
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

      redirect('admin/User', 'refresh');
    }

    $data['title']          = "Users";
    $data['desc']		        = "New User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'New');
    $data['content']        = $this->load->view('admin/user_new', array(), TRUE);

    $this->load->view('admin/template', $data);
  }

  public function Edituser($id){
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data['name']    = $this->input->post('name');
      $data['gender']  = $this->input->post('gender');
      $data['birth']   = $this->input->post('birth');
      $data['address'] = $this->input->post('address');
      $data['phone']   = $this->input->post('phone');

      $this->Model_user->update($data, $id);
      // $this->session->set_flashdata('message', 'Success !');
      redirect('admin/User', 'refresh');
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

  public function Deleteuser($id){
    $this->Model_user->delete($id);

    redirect('admin/User', 'refresh');
  }
}
