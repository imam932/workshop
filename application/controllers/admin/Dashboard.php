<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('assets/csslinkadm');
		$this->load->view('admin/index');
		$this->load->view('assets/jslinkadm');
	}
}

?>