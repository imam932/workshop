<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Model_user');
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
    $data['title']          = "Users";
    $data['desc']		        = "New User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'New');
    $data['content']        = $this->load->view('admin/user_new', array(), TRUE);

    $this->load->view('admin/template', $data);
  }

  public function Edituser($id){

    $data['title']          = "Users";
    $data['desc']		        = "Edir User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'Edit');
    $data['content']        = $this->load->view('admin/user_edit', $data, TRUE);

    $data['user']  = $this->input->post('user');
    $this->Model_user->update($data, $id);
// print_r($data['user']);
    // redirect('admin/User', 'refresh');
  }

  public function Deleteuser($id){
    $this->Model_user->delete($id);

    redirect('admin/User', 'refresh');
  }
}
