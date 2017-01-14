<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('assets/csslinkadm');
		$this->load->view('admin/index');
		$this->load->view('assets/jslinkadm');
	}

	public function login(){
		$this->load->view('admin/login');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */