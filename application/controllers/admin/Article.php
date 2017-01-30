<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

	public function __construct()
  {
    parent::__construct();
		$this->load->model('Model_article');
		$this->load->model('Model_category');
		$this->load->model('Model_message');
  }

	public function index()
	{
		//load data
		$data['article'] = $this->Model_article->select_all();
		// error handling
		if(!empty($this->session->flashdata('message')))
		{
			$data['message'] = $this->session->flashdata('message');
		}
		// load page
		$data['category'] = $this->Model_category->select_all();
		$data['content'] = $this->load->view('admin/article', $data, TRUE);

		//load template
		$data['title'] = "Article";
		$data['desc'] = "Create or Manage Articles";
		$data['breadcrumb'] = array('Dashboard', 'Article');
		$data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);

		$this->load->view('admin/template', $data);
	}

	public function newArticle()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//form validation
	    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('id_category', 'Category', 'required');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/Article/New', 'refresh');
	    }
			else
			{
				$data['id_article'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
				$data['date'] = date('Y-m-d H:i:s');
				$data['title'] = $this->input->post('title');
				$data['id_category'] = $this->input->post('id_category');
				$data['posting'] = $this->input->post('posting');
				$data['id_user'] = $this->session->userdata('logged_in')['id_user'];
				$data['publish'] = 1;

				//upload file config
	      $path = 'assets/upload/article';
	      $config['upload_path'] = $path;
	      $config['allowed_types'] = 'jpg|png';
	      $config['max_size'] = 5000;
	      $config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				//uploading File
	      if(!$this->upload->do_upload('image'))
	      {
	        $this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/Article/New', 'refresh');
	      }
	      else
	      {
	        $data['image'] = $this->upload->data()['file_name'];
	        $this->Model_article->insert($data);
	        $this->session->set_flashdata('message', 'Success ! Article has been created');
					redirect('admin/Article', 'refresh');
	      }
			}
		}

		// load data
		$data['category'] = $this->Model_category->select_all();
		// error handling
		if(!empty($this->session->flashdata('error')))
		{
			$data['error'] = $this->session->flashdata('error');
		}
		// load page
		$data['content'] = $this->load->view('admin/article_new', $data, TRUE);

		//load template
		$data['title'] = "Article";
		$data['desc'] = "Create New Article";
		$data['breadcrumb'] = array('Dashboard', 'Article', 'New');
		$data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);

		$this->load->view('admin/template', $data);
	}

	function deleteArticle($id)
	{
		// delete image File
    $path = "assets/upload/article/";
    $record = $this->Model_article->select_by_id($id);
    $filename = $record[0]->image;
    unlink($path . $filename);

		$this->Model_article->delete($id);
		$this->session->set_flashdata('message', 'Success ! Article has been deleted');
		redirect('admin/Article', 'refresh');
	}

	function editArticle($id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//form validation
	    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/Article/editArticle/' . $id, 'refresh');
	    }
			else
			{
				$data['title'] = $this->input->post('title');
				$data['id_category'] = $this->input->post('id_category');
				$data['posting'] = $this->input->post('posting');
				$data['id_user'] = $this->session->userdata('logged_in')['id_user'];

				if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $path = 'assets/upload/article';
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = 5000;
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          //uploading File
          if(!$this->upload->do_upload('image'))
          {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/Article/editArticle/' . $id, 'refresh');
          }
          else
          {
            // delete image File
            $path = "assets/upload/article/";
            $record = $this->Model_article->select_by_id($id);
            $filename = $record[0]->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

				$this->Model_article->update($data, $id);

				$this->session->set_flashdata('message', 'Success ! Article has been edited');
				redirect('admin/Article', 'refresh');
			}
		}

		// load data
		$data['category'] = $this->Model_category->select_all();
		$data['article'] = $this->Model_article->select_by_id($id);
		// error handling
		if(!empty($this->session->flashdata('error')))
		{
			$data['error'] = $this->session->flashdata('error');
		}
		// load page
		$data['content'] = $this->load->view('admin/article_edit', $data, TRUE);

		// load template
		$data['title'] = "Article";
		$data['desc'] = "Edit Article";
		$data['breadcrumb'] = array('Dashboard', 'Article', 'Edit');
		$data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);

		$this->load->view('admin/template', $data);
	}

	function publish($id, $bool)
	{
		$data['publish'] = $bool;
		$this->Model_article->update($data, $id);
		redirect('admin/Article', 'refresh');
	}
}

/* End of file Article.php */
/* Location: ./application/controllers/Article.php */
?>
