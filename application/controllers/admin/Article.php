<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

	public function __construct()
  {
    parent::__construct();
  }

	public function index(){
		$data['title'] = "Article";
		$data['desc'] = "Create or Manage Articles";
		$data['breadcrumb'] = array('Dashboard', 'Article');
		$data['content'] = $this->load->view('admin/article', array(), TRUE);

		$this->load->view('admin/template', $data);
	}

	public function newArticle(){
		$data['title'] = "Article";
		$data['desc'] = "Create New Article";
		$data['breadcrumb'] = array('Dashboard', 'Article', 'New');
		$data['content'] = $this->load->view('admin/article_new', array(), TRUE);

		$this->load->view('admin/template', $data);
	}
}

/* End of file Article.php */
/* Location: ./application/controllers/Article.php */
?>
