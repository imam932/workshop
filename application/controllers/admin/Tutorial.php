<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_tutorial');
    $this->load->model('Model_division');
    $this->load->model('Model_message');
  }

  public function index()
  {
    // load data
    $data['tutorial'] = $this->Model_tutorial->select_all();

    if(!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    //load page
    $data['division'] = $this->Model_division->select_all();
    $data['content'] = $this->load->view('admin/tutorial', $data, TRUE);

    // load template
    $data['title'] = "Tutorial";
    $data['desc'] = "Create or Manage Tutorial";
    $data['breadcrumb'] = array('Dashboard', 'Tutorial');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);

    $this->load->view('admin/template', $data);
  }

  function newTutorial()
  {
    if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
      $this->form_validation->set_rules('id_division', 'Division', 'required');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Tutorial/New', 'refresh');
      }
      else
      {
        $data['id_tutorial'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
        $data['date']        = date('Y-m-d H:i:s');
        $data['title']       = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['id_user']     = $this->session->userdata('logged_in')['id_user'];
        $data['id_division'] = $this->input->post('id_division');
        $data['publish']     = 1;

        //upload file config
	      $path = 'assets/upload/tutorial';
	      $config['upload_path'] = $path;
	      $config['allowed_types'] = 'jpg|png';
	      $config['max_size'] = 5000;
	      $config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				//uploading File
	      if(!$this->upload->do_upload('image'))
	      {
	        $this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/Tutorial/New', 'refresh');
	      }
	      else
	      {
	        $data['image'] = $this->upload->data()['file_name'];
	        $this->Model_tutorial->insert($data);
	        $this->session->set_flashdata('message', 'Success ! Tutorial has been created');
					redirect('admin/Tutorial', 'refresh');
	      }
      }
    }
        // // load data
    $data['division'] = $this->Model_division->select_all();
    // error handling
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }

    // load page
    $data['content'] = $this->load->view('admin/tutorial_new', $data, TRUE);

    // load template
    $data['title']        = "Tutorial";
    $data['desc']         = "Create New Tutorial";
    $data['breadcrumb']   = array('Dashboard', 'Tutorial', 'New');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $this->load->view('admin/template', $data);
  }

  public function editTutorial($id)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//form validation
	    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/Tutorial/editTutorial/' . $id, 'refresh');
	    }
			else
			{
				$data['title']          = $this->input->post('title');
				$data['id_division']    = $this->input->post('id_division');
				$data['description']    = $this->input->post('description');
				$data['id_user']        = $this->session->userdata('logged_in')['id_user'];

        if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $path = 'assets/upload/tutorial';
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = 5000;
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          //uploading File
          if(!$this->upload->do_upload('image'))
          {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/Tutorial/editTutorial/' . $id, 'refresh');
          }
          else
          {
            // delete image File
            $path = "assets/upload/tutorial/";
            $record = $this->Model_tutorial->select_by_id($id);
            $filename = $record[0]->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

				$this->Model_tutorial->update($data, $id);

				$this->session->set_flashdata('message', 'Success ! Tutorial has been edited');
				redirect('admin/Tutorial', 'refresh');
			}
		}

		// load data
		$data['division'] = $this->Model_division->select_all();
		$data['tutorial'] = $this->Model_tutorial->select_by_id($id);
		// error handling
		if(!empty($this->session->flashdata('error')))
		{
			$data['error'] = $this->session->flashdata('error');
		}

    // load page
    $data['content'] = $this->load->view('admin/tutorial_edit', $data, TRUE);

    // load template
    $data['title']        = "Tutorial";
    $data['desc']         = "Edit Tutorial";
    $data['breadcrumb']   = array('Dashboard', 'Tutorial', 'Edit');
    $data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
    $this->load->view('admin/template', $data);
  }

  public function publish($id, $bool)
  {
    $data['publish'] = $bool;
    $this->Model_tutorial->update($data, $id);
    redirect('admin/Tutorial', 'refresh');
  }

  public function deleteTutorial($id)
  {
    // delete image File
    $path = "assets/upload/tutorial/";
    $record = $this->Model_tutorial->select_by_id($id);
    $filename = $record[0]->image;
    unlink($path . $filename);

    $this->Model_tutorial->delete($id);
    $this->session->set_flashdata('message', 'Success ! Tutorial has been deleted');
		redirect('admin/Tutorial', 'refresh');
  }
}

?>
