<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends User_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_article', 'Model_message'));
  }

  function index()
  {
    //error handling
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    else if(!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    // load page
    $data['content'] = $this->load->view('contact', $data, TRUE);

    //load template
    $data['title'] = "Hubungi Kami";
    $data['desc'] = "Ingin bergabung, atau ada kritik dan saran ?";
    $data['breadcrumb'] = array(
      ['label' => 'Home', 'url' => base_url()],
      ['label' => 'Hubungi Kami', 'url' => ""]
    );
    $data['article_footer']   = $this->Model_article->select_all(4);

    $this->load->view('template', $data);
  }

  public function sendMessage(){
    // form_validation
    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
    $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('error', validation_errors());
    }else{
      $data['id_message'] = random_string('alnum', 4) . date('dmy') . random_string('alnum', 4);
      $data['name']       = $this->input->post('name');
      $data['email']      = $this->input->post('email');
      $data['date']       = date('Y-m-d H:i:s');
      $data['message']    = $this->input->post('message');
      $data['readed'] = FALSE;

      $this->Model_message->insert($data);
      $this->session->set_flashdata('message', 'Sukses ! Pesan telah terkirim');
    }

    redirect('Contact', 'refresh');
  }

}
