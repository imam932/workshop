<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_tutorial');
    $this->load->model('Model_category');
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
    $data['content'] = $this->load->view('admin/tutorial', $data, TRUE);

    // load template
    $data['title'] = "Tutorial";
    $data['desc'] = "Create or Manage Tutorial";
    $data['breadcrumb'] = array('Dashboard', 'Tutorial');

    $this->load->view('admin/template', $data);
  }

  function newTutorial()
  {
    if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
      $this->form_validation->set_rules('id_category', 'Category', 'required');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Tutorial/New', 'refresh');
      }
      else
      {
        $data['id_tutorial'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
        $data['date']        = date('Y-m-d k:i:s');
        $data['title']       = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['id_user']     = $this->session->userdata('logged_in')['id_user'];
        $data['id_category'] = $this->input->post('id_category');
        $data['publish']     = 1;
        $this->Model_tutorial->insert($data);

        $this->session->set_flashdata('message', 'Success ! Tutorial has been created');
        redirect('admin/Tutorial', 'refresh');
      }
    }
        // // load data
    $data['category'] = $this->Model_category->select_all();
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
				$data['id_category']    = $this->input->post('id_category');
				$data['description']    = $this->input->post('description');
				$data['id_user']        = $this->session->userdata('logged_in')['id_user'];
				$this->Model_tutorial->update($data, $id);

				$this->session->set_flashdata('message', 'Success ! Tutorial has been edited');
				redirect('admin/Tutorial', 'refresh');
			}
		}

		// load data
		$data['category'] = $this->Model_category->select_all();
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
    $this->Model_tutorial->delete($id);
    $this->session->set_flashdata('message', 'Success ! Tutorial has been deleted');
		redirect('admin/Tutorial', 'refresh');
  }
}

?>
