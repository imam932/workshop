<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['desc'] = "Static Overview";
		$data['content'] = $this->load->view('admin/index', array(),TRUE);

		$this->load->view('admin/template', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
