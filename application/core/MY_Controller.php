<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('admin/Login','refresh');
		}
	}
}

?>