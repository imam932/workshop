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

class User_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Model_log'));

		$data['ip'] = $this->input->server('REMOTE_ADDR');
		$data['ref'] = $this->input->server('HTTP_REFERER');
		$data['url'] = $this->input->server('REQUEST_URI');
		$data['date'] = date('Y-m-d H:i:s');
		$data['agent'] = $this->input->server('HTTP_USER_AGENT');

		$this->Model_log->insert($data);
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

?>