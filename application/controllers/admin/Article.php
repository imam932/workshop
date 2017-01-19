<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

	public function __construct()
  {
    parent::__construct();
		$this->load->model('Model_article');
		$this->load->model('Model_category');
  }

	public function index()
	{
		//load data
		$data['article'] = $this->Model_article->select_all();
		$data['content'] = $this->load->view('admin/article', $data, TRUE);

		//load template
		$data['title'] = "Article";
		$data['desc'] = "Create or Manage Articles";
		$data['breadcrumb'] = array('Dashboard', 'Article');

		$this->load->view('admin/template', $data);
	}

	public function newArticle()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$data['id_article'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
			$data['date'] = date('Y-m-d h:i:s');
			$data['title'] = $this->input->post('title');
			$data['id_category'] = $this->input->post('id_category');
			$data['posting'] = $this->input->post('posting');
			$data['id_user'] = $this->session->userdata('logged_in')['id_user'];

			$this->Model_article->insert($data);

			redirect('admin/Article', 'refresh');
		}

		// load data
		$data['category'] = $this->Model_category->select_all();
		$data['content'] = $this->load->view('admin/article_new', $data, TRUE);

		//load template
		$data['title'] = "Article";
		$data['desc'] = "Create New Article";
		$data['breadcrumb'] = array('Dashboard', 'Article', 'New');

		$this->load->view('admin/template', $data);
	}

	function deleteArticle($id)
	{
		$this->Model_article->delete($id);

		redirect('admin/Article', 'refresh');
	}

	function editArticle($id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$data['title'] = $this->input->post('title');
			$data['id_category'] = $this->input->post('id_category');
			$data['posting'] = $this->input->post('posting');
			$data['id_user'] = $this->session->userdata('logged_in')['id_user'];
			$this->Model_article->update($data, $id);

			redirect('admin/Article', 'refresh');
		}

		// load data
		$data['category'] = $this->Model_category->select_all();
		$data['article'] = $this->Model_article->select_by_id($id);
		$data['content'] = $this->load->view('admin/article_edit', $data, TRUE);

		//load template
		$data['title'] = "Article";
		$data['desc'] = "Edit Article";
		$data['breadcrumb'] = array('Dashboard', 'Article', 'Edit');

		$this->load->view('admin/template', $data);
	}
}

/* End of file Article.php */
/* Location: ./application/controllers/Article.php */
?>
