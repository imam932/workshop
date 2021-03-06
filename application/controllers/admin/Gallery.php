<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_gallery');
  }

  function index()
  {
    // load data
    $data['gallery'] = $this->Model_gallery->select_all();
    $data['upload_error'] = $this->session->flashdata('upload_error');
    $data['message'] = $this->session->flashdata('message');

    // load page
    $this->render['content']       = $this->load->view('admin/gallery/index', $data, TRUE);

    // load template
    $this->render['title']         = "Gallery";
    $this->render['desc']		       = "Gallery Event WRI";
    $this->render['breadcrumb']    = array('Dashboard', 'Gallery');

    $this->load->view('admin/template', $this->render);
  }

  function store()
  {
    //form validation
    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');

    if($this->form_validation->run())
    {
      $data['title'] = $this->input->post('title');
      $data['date'] = date('Y-m-d H:i:s');
      $data['description'] = $this->input->post('description');
      $data['id_gallery'] = random_string('alnum', 5) . date('my') . random_string('alnum', 6);

      //upload file config
      $path = 'assets/upload/gallery';
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'jpg|png';
      $config['max_size'] = 5000;
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);

      //uploading File
      if(!$this->upload->do_upload('image'))
      {
        $this->session->set_flashdata('upload_error', $this->upload->display_errors());
        $this->index();
      }
      else
      {
        $data['image'] = $this->upload->data()['file_name'];
        $this->Model_gallery->insert($data);

        $this->session->set_flashdata('message', 'Success ! Gallery has been added');
        redirect('admin/Gallery', 'refresh');
      }
    }
    else
    {
      $this->index();
    }
  }

  function delete($id)
  {
    // delete image File
    $path = "assets/upload/gallery/";
    $record = $this->Model_gallery->select_by_id($id);
    $filename = $record->image;
    unlink($path . $filename);

    // delete record
    $this->Model_gallery->delete($id);
    $this->session->set_flashdata('message', 'Success ! Gallery has been deleted');
    redirect('admin/Gallery', 'refresh');
  }

  function edit($id)
  {
    if($this->input->post())
    {
      //form validation
      $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
      $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');

      if($this->form_validation->run())
      {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');

        if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $path = 'assets/upload/gallery';
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = 5000;
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          //uploading File
          if(!$this->upload->do_upload('image'))
          {
            $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            goto view;
          }
          else
          {
            // delete image File
            $path = "assets/upload/gallery/";
            $record = $this->Model_gallery->select_by_id($id);
            $filename = $record->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

        $this->Model_gallery->update($data, $id);
        $this->session->set_flashdata('message', 'Success ! Gallery has been edited');
        redirect('admin/Gallery', 'refresh');
      }
    }

    view:

    // load data
    $data['gallery'] = $this->Model_gallery->select_by_id($id);
    // upload error message
    $data['upload_error'] = $this->session->flashdata('upload_error');

    // load page
    $this->render['content'] = $this->load->view('admin/gallery/edit', $data, TRUE);

    // load template
    $this->render['title']         = "Gallery";
    $this->render['desc']		       = "Edit Gallery";
    $this->render['breadcrumb']    = array('Dashboard', 'Gallery', 'Edit');

    $this->load->view('admin/template', $this->render);
  }


}
