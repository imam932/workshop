<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_gallery');
    $this->load->model('Model_message');
  }

  function index()
  {
    // load data
    $data['gallery'] = $this->Model_gallery->select_all();
    // error handling
    if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    else if(!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    // load page
    $data['content']       = $this->load->view('admin/gallery', $data, TRUE);

    // load template
    $data['title']         = "Gallery";
    $data['desc']		       = "Gallery Event WRI";
    $data['breadcrumb']    = array('Dashboard', 'Gallery');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $this->load->view('admin/template', $data);
  }

  function newGallery()
  {
    //form validation
    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');

    if(!$this->form_validation->run())
    {
      $this->session->set_flashdata('error', validation_errors());
    }
    else
    {
      $data['title'] = $this->input->post('title');
      $data['date'] = date('Y-m-d H:i:s');
      $data['description'] = $this->input->post('description');
      $data['id_gallery'] = random_string('alnum', 5) . date('my') . random_string('alnum', 6);

      //upload file config
      $path = 'assets/upload';
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'jpg|png';
      $config['max_size'] = 5000;
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);

      //uploading File
      if(!$this->upload->do_upload('image'))
      {
        $this->session->set_flashdata('error', $this->upload->display_errors());
      }
      else
      {
        $data['image'] = $this->upload->data()['file_name'];
        $this->Model_gallery->insert($data);

        $this->session->set_flashdata('message', 'Success ! Gallery has been added');
      }
    }

    redirect('admin/Gallery', 'refresh');
  }

  function deleteGallery($id)
  {
    // delete image File
    $path = "assets/upload/";
    $record = $this->Model_gallery->select_by_id($id);
    $filename = $record[0]->image;
    unlink($path . $filename);

    // delete record
    $this->Model_gallery->delete($id);
    $this->session->set_flashdata('message', 'Success ! Gallery has been deleted');
    redirect('admin/Gallery', 'refresh');
  }

  function editGallery($id)
  {
    if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
      $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Gallery/editGallery/' . $id, 'refresh');
      }
      else
      {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');

        if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $path = 'assets/upload';
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = 5000;
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          //uploading File
          if(!$this->upload->do_upload('image'))
          {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/Gallery/editGallery/' . $id, 'refresh');
          }
          else
          {
            // delete image File
            $path = "assets/upload/";
            $record = $this->Model_gallery->select_by_id($id);
            $filename = $record[0]->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

        $this->Model_gallery->update($data, $id);
        $this->session->set_flashdata('message', 'Success ! Gallery has been edited');
        redirect('admin/Gallery', 'refresh');
      }
    }

    // load data
    $data['gallery'] = $this->Model_gallery->select_by_id($id);
    // error handling
    if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load page
    $data['content'] = $this->load->view('admin/gallery_edit', $data, TRUE);

    // load template
    $data['title']         = "Gallery";
    $data['desc']		       = "Edit Gallery";
    $data['breadcrumb']    = array('Dashboard', 'Gallery', 'Edit');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $this->load->view('admin/template', $data);
  }


}
