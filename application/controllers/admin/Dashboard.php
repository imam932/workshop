<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$this->load->model(array('Model_message'));

		$data['title'] = "Dashboard";
		$data['desc'] = "Static Overview";
		$data['breadcrumb'] = array('Dashboard');
		$data['content'] = $this->load->view('admin/index', array(),TRUE);
		$data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);

		$this->load->view('admin/template', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
