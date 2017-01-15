<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$this->load->view('assets/csslinkadm');
		$this->load->view('admin/index');
		$this->load->view('assets/jslinkadm');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */