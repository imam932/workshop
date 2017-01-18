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
    $data['gallery']       = $this->Model_gallery->select_all();
    $data['content']       = $this->load->view('admin/gallery', $data, TRUE);

    $data['title']         = "Gallery";
    $data['desc']		       = "Gallery Event WRI";
    $data['breadcrumb']    = array('Dashboard', 'Gallery');

    $this->load->view('admin/template', $data);
  }

  function newGallery()
  {
    $data['title'] = $this->input->post('title');
    $data['date'] = date('Y-m-d h:i:s');
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
      redirect('admin/Gallery', 'refresh');
    }
    else
    {
      $data['image'] = $this->upload->data()['file_name'];
      $this->Model_gallery->insert($data);
      redirect('admin/Gallery', 'refresh');
    }

  }

  function deleteGallery($id)
  {
    $this->Model_gallery->delete($id);
    redirect('admin/Gallery', 'refresh');
  }

  function editGallery($id)
  {
    if($this->input->server('REQUEST_METHOD') == 'POST')
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
          redirect('admin/Gallery/editGallery/' . $id, 'refresh');
        }
        else
        {
          $data['image'] = $this->upload->data()['file_name'];
        }
      }

      $this->Model_gallery->update($data, $id);
      redirect('admin/Gallery', 'refresh');
    }

    $data['gallery'] = $this->Model_gallery->select_by_id($id);
    $data['content'] = $this->load->view('admin/gallery_edit', $data, TRUE);

    $data['title']         = "Gallery";
    $data['desc']		       = "Edit Gallery";
    $data['breadcrumb']    = array('Dashboard', 'Gallery', 'Edit');

    $this->load->view('admin/template', $data);
  }


}
