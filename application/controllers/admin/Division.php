<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_division'));
  }

  function index()
  {
    //load data
    $data['division'] = $this->Model_division->select_all();
    //cek error
    if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    else if(!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    //load page
    $this->render['content'] = $this->load->view('admin/division/index', $data, TRUE);

    //load template
    $this->render['title'] = "Division";
    $this->render['desc']		= "WRI Division";
    $this->render['breadcrumb'] = array('Dashboard', 'Division');

    $this->load->view('admin/template', $this->render);
  }

  function store()
	{
		if ($this->input->post())
		{
			//form validation
	    $this->form_validation->set_rules('division', 'Division', 'trim|required|xss_clean');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/Division/store', 'refresh');
	    }
			else
			{
				$data['id_division'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
				$data['division'] = $this->input->post('division');
				$data['description'] = $this->input->post('description');

				//upload file config
	      $path = 'assets/upload/division';
	      $config['upload_path'] = $path;
	      $config['allowed_types'] = 'jpg|png';
	      $config['max_size'] = 5000;
	      $config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				//uploading File
	      if(!$this->upload->do_upload('image'))
	      {
	        $this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/Division/store', 'refresh');
	      }
	      else
	      {
	        $data['image'] = $this->upload->data()['file_name'];
	        $this->Model_division->insert($data);
	        $this->session->set_flashdata('message', 'Success ! Division has been created');
					redirect('admin/Division', 'refresh');
	      }
			}
		}

		// error handling
    $data = array();
		if(!empty($this->session->flashdata('error')))
		{
			$data['error'] = $this->session->flashdata('error');
		}

		// load page
		$this->render['content'] = $this->load->view('admin/division/store', $data, TRUE);

		//load template
		$this->render['title'] = "Division";
		$this->render['desc'] = "Create New Division";
		$this->render['breadcrumb'] = array('Dashboard', 'Division', 'New');

		$this->load->view('admin/template', $this->render);
	}

  function edit($id)
  {
    if ($this->input->post())
		{
			//form validation
	    $this->form_validation->set_rules('division', 'Division', 'trim|required|xss_clean');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/Division/edit/' . $id, 'refresh');
	    }
			else
			{
				$data['division'] = $this->input->post('division');
				$data['description'] = $this->input->post('description');

				if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $path = 'assets/upload/division';
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = 5000;
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          //uploading File
          if(!$this->upload->do_upload('image'))
          {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/Division/edit/' . $id, 'refresh');
          }
          else
          {
            // delete image File
            $path = "assets/upload/division/";
            $record = $this->Model_division->select_by_id($id);
            $filename = $record[0]->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

				$this->Model_division->update($data, $id);

				$this->session->set_flashdata('message', 'Success ! Division has been edited');
				redirect('admin/Division', 'refresh');
			}
    }

    // load data
		$data['division'] = $this->Model_division->select_by_id($id);
		// error handling
		if(!empty($this->session->flashdata('error')))
		{
			$data['error'] = $this->session->flashdata('error');
		}
		// load page
		$this->render['content'] = $this->load->view('admin/division/edit', $data, TRUE);

		// load template
		$this->render['title'] = "Division";
		$this->render['desc'] = "Edit Division";
		$this->render['breadcrumb'] = array('Dashboard', 'Division', 'Edit');

		$this->load->view('admin/template', $this->render);
  }

  function delete($id)
	{
		// delete image File
    $path = "assets/upload/division/";
    $record = $this->Model_division->select_by_id($id);
    $filename = $record[0]->image;
    unlink($path . $filename);

		$this->Model_division->delete($id);
		$this->session->set_flashdata('message', 'Success ! Division has been deleted');
		redirect('admin/Division', 'refresh');
	}
}
