<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

	public function index()
	{
		$this->load->view('assets/csslinkadm');
		$this->load->view('admin/navbar');
		$this->load->view('admin/pos');
		$this->load->view('assets/jslinkadm');
	}

}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */