<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_message');
  }

  function index(){
    //load template
    $data['title'] = "Contact Us";
    $data['desc'] = "Contact , info";
    $data['breadcrumb'] = array('Home','Contact');
    $data['content'] = $this->load->view('contact', array(), TRUE);

    $this->load->view('template', $data);
  }

  public function sendMessage(){
    // form_validation
    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
    $this->form_validation->set_rules('id_message', 'Contact', 'required');
    $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('Contact', 'refresh');
    }else{
      $data['id_message'] = random_string('alnum', 4) . date('dmy') . random_string('alnum', 4);
      $data['name']       = $this->input->post('name');
      $data['email']      = $this->input->post('email');
      $data['date']       = date('Y-m-d');
      $data['message']    = $this->input->post('message');

      $this->Model_message->insert($data);
      $this->session->set_flashdata('message', 'Sukses ! Pesan telah terkirim');
    }
    redirect('Contact', 'reftesh');
  }

}
