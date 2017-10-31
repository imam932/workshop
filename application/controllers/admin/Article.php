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
		// success message
		$data['message'] = $this->session->flashdata('message');

		// load page
		$data['category'] = $this->Model_category->select_all();
		$this->render['content'] = $this->load->view('admin/article/index', $data, TRUE);

		//load template
		$this->render['title'] = "Article";
		$this->render['desc'] = "Create or Manage Articles";
		$this->render['breadcrumb'] = array('Dashboard', 'Article');

		$this->load->view('admin/template', $this->render);
	}

	public function store()
	{
		if ($this->input->post())
		{
			//form validation
	    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('id_category', 'Category', 'required');
	    $this->form_validation->set_rules('posting', 'Posting', 'required');

	    if($this->form_validation->run())
			{
				$data['id_article'] = random_string('alnum', 6) . date('my') . random_string('alnum', 5);
				$data['date'] = date('Y-m-d H:i:s');
				$data['title'] = $this->input->post('title');
				$data['id_category'] = $this->input->post('id_category');
				$data['id_user'] = $this->session->userdata('logged_in')['id_user'];
				$data['publish'] = 1;

				//upload file config
	      $path = 'assets/upload/article/' . $data['id_article'] . "/";
	      $config['upload_path'] = $path;
	      $config['allowed_types'] = 'jpg|png';
	      $config['max_size'] = 5000;
	      $config['file_name'] = uniqid('thumbnail');
				$this->load->library('upload', $config);

        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }

				//uploading File
	      if(!$this->upload->do_upload('image'))
	      {
	      	rmdir($path);
	        $this->session->set_flashdata('upload_error', $this->upload->display_errors());
	      }
	      else
	      {
          $dom = new DOMDocument();
          $dom->loadHTML($this->input->post('posting'));
          foreach ($dom->getElementsByTagName('img') as $tag) {
            // store img data
            $img = $tag->getAttribute('src');
            $src = $this->save64Image($img, $path);
            // change DOM
            $tag->setAttribute("src", $src);
          }
          $data['posting'] = $dom->saveHTML();

	        $data['image'] = $this->upload->data()['file_name'];
	        $this->Model_article->insert($data);
	        $this->session->set_flashdata('message', 'Success ! Article has been created');
					redirect('admin/Article', 'refresh');
	      }
			}
		}

		// load data
		$data['category'] = $this->Model_category->select_all();
		// error handling for upload file
		$data['upload_error'] = $this->session->flashdata('upload_error');
		// load page
		$this->render['content'] = $this->load->view('admin/article/store', $data, TRUE);

		//load template
		$this->render['title'] = "Article";
		$this->render['desc'] = "Create New Article";
		$this->render['breadcrumb'] = array('Dashboard', 'Article', 'New');

		$this->load->view('admin/template', $this->render);
	}

	function delete($id)
	{
		// delete all image File in directory and remove directory
    $path = "assets/upload/article/" . $id . "/";
    foreach (glob($path . "*.*") as $file) {
    	unlink($file);
		}
    rmdir($path);

		$this->Model_article->delete($id);
		$this->session->set_flashdata('message', 'Success ! Article has been deleted');
		redirect('admin/Article', 'refresh');
	}

	function edit($id)
	{
		if ($this->input->post())
		{
			//form validation
	    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('posting', 'Posting', 'required');

	    if ($this->form_validation->run())
			{
				$data['title'] = $this->input->post('title');
				$data['id_category'] = $this->input->post('id_category');
				$data['id_user'] = $this->session->userdata('logged_in')['id_user'];

        $path = 'assets/upload/article/' . $id . '/';

				if(!$_FILES['image']['name'] == '')
        {
          //upload file config
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = 5000;
          $config['file_name'] = uniqid('thumbnail');

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
            $record = $this->Model_article->select_by_id($id);
            $filename = $record->image;
            unlink($path . $filename);

            $data['image'] = $this->upload->data()['file_name'];
          }
        }

        $dom = new DOMDocument();
        $dom->loadHTML($this->input->post('posting'));

				// search for unused image and delete it from server
				$image_from_server = array();
        foreach ($dom->getElementsByTagName('img') as $tag) {
        	$img = $tag->getAttribute('src');
        	if (strpos($img, 'base64') === FALSE) {
            $url = explode('/', rtrim($img, '/'));
        		array_push($image_from_server, end($url));
					}
				}
				foreach (glob($path . '*.*') as $file) {
        	$url = explode('/', $file);
        	$filename = end($url);
        	$found = FALSE;
					foreach ($image_from_server as $img) {
						if ($filename == $img) {
							$found = TRUE;
						}
					}
					if($found == FALSE && strpos($filename, 'thumbnail') === FALSE) {
						unlink($file);
					}
				}

        // convert base64 to image and put it on server
        foreach ($dom->getElementsByTagName('img') as $tag) {
          $img = $tag->getAttribute('src');
          if (strpos($img, 'base64,') !== FALSE) {
            $src = $this->save64Image($img, $path);
            $tag->setAttribute("src", $src);
					}
        }

        $data['posting'] = $dom->saveHTML();
				$this->Model_article->update($data, $id);
				$this->session->set_flashdata('message', 'Success ! Article has been edited');
				redirect('admin/Article', 'refresh');
			}
		}

		view:

		// load data
		$data['category'] = $this->Model_category->select_all();
		$data['article'] = $this->Model_article->select_by_id($id);
		// upload error handling
		$data['upload_error'] = $this->session->flashdata('upload_error');

		// load page
		$this->render['content'] = $this->load->view('admin/article/edit', $data, TRUE);

		// load template
		$this->render['title'] = "Article";
		$this->render['desc'] = "Edit Article";
		$this->render['breadcrumb'] = array('Dashboard', 'Article', 'Edit');

		$this->load->view('admin/template', $this->render);
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
