<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Model_activity'));
  }

  function index()
  {
    //load data
    $data['activity'] = $this->Model_activity->select_all();
    $data['message'] = $this->session->flashdata('message');

    //load page
    $this->render['content'] = $this->load->view('admin/activity/index', $data, TRUE);

    //load template
    $this->render['title'] = "Activity";
    $this->render['desc']		= "WRI Activity";
    $this->render['breadcrumb'] = array('Dashboard', 'Activity');

    $this->load->view('admin/template', $this->render);
  }

  function store()
	{
		if ($this->input->post())
		{
			//form validation
	    $this->form_validation->set_rules('activity', 'Activity', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

	    if($this->form_validation->run())
			{
				$data['id_activity'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
				$data['activity'] = $this->input->post('activity');
				$data['description'] = $this->input->post('description');

				//upload file config
	      $path = 'assets/upload/activity';
	      $config['upload_path'] = $path;
	      $config['allowed_types'] = 'jpg|png';
	      $config['max_size'] = 5000;
	      $config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				//uploading File
	      if(!$this->upload->do_upload('image'))
	      {
	        $this->session->set_flashdata('upload_error', $this->upload->display_errors());
	      }
	      else
	      {
	        $data['image'] = $this->upload->data()['file_name'];
	        $this->Model_activity->insert($data);
	        $this->session->set_flashdata('message', 'Success ! Activity has been created');
					redirect('admin/Activity', 'refresh');
	      }
			}
		}

		// error handling
    $data['upload_error'] = $this->session->flashdata('upload_error');

		// load page
		$this->render['content'] = $this->load->view('admin/activity/store', $data, TRUE);

		//load template
		$this->render['title'] = "Activity";
		$this->render['desc'] = "Create New Activity";
		$this->render['breadcrumb'] = array('Dashboard', 'Activity', 'New');

		$this->load->view('admin/template', $this->render);
	}

  function edit($id)
  {
    if ($this->input->post())
		{
			//form validation
	    $this->form_validation->set_rules('activity', 'Activity', 'trim|required|xss_clean');
      $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

	    if($this->form_validation->run())
			{
				$data['activity'] = $this->input->post('activity');
				$data['description'] = $this->input->post('description');

				if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $path = 'assets/upload/activity';
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
            $path = "assets/upload/activity/";
            $record = $this->Model_activity->select_by_id($id);
            $filename = $record[0]->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

				$this->Model_activity->update($data, $id);

				$this->session->set_flashdata('message', 'Success ! Activity has been edited');
				redirect('admin/Activity', 'refresh');
			}
    }

    view:

    // load data
		$data['activity'] = $this->Model_activity->select_by_id($id);
    $data['upload_error'] = $this->session->flashdata('upload_error');


		// load page
		$this->render['content'] = $this->load->view('admin/activity/edit', $data, TRUE);

		// load template
		$this->render['title'] = "Activity";
		$this->render['desc'] = "Edit Activity";
		$this->render['breadcrumb'] = array('Dashboard', 'Activity', 'Edit');

		$this->load->view('admin/template', $this->render);
  }

  function delete($id)
	{
		// delete image File
    $path = "assets/upload/activity/";
    $record = $this->Model_activity->select_by_id($id);
    $filename = $record[0]->image;
    unlink($path . $filename);

		$this->Model_activity->delete($id);
		$this->session->set_flashdata('message', 'Success ! Activity has been deleted');
		redirect('admin/Activity', 'refresh');
	}
}