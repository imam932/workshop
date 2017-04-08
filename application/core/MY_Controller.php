<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		// check login
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('admin/Login','refresh');
		}

		// check module
		$this->load->model('Model_privilege');
		$privilege = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);
		$redirect = true;
		foreach ($privilege as $row)
		{
			if($this->router->class == $row->controller)
			{
				$redirect = false;
			}
		}

		if($redirect)
		{
			redirect('admin/','refresh');
		}
	}
}

class User_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// check if cookie is exist
		if(is_null(get_cookie("visitor")))
		{
			$this->load->model(array('Model_log'));
			date_default_timezone_set('Asia/Jakarta');

			// get visitor IP
			$data['ip'] = $this->input->server('REMOTE_ADDR');

			// get visitor referrer
			$data['ref'] = $this->agent->referrer();

			// when visitor come ?
			$data['date'] = date('Y-m-d H:i:s');

			//get visitor browser
			$data['browser'] = $this->agent->browser();

			//get visitor platform
			$data['platform'] = $this->agent->platform();

			// get visitor Location
			$data['location'] = "unknown";
			$detail = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $data['ip'] ));

			if($detail->geoplugin_status == 200)
			{
				$country = $detail->geoplugin_countryName;
				$data['location'] = $country;
			}

			// insert visitor to db
			$this->Model_log->insert($data);

			// set cookie
			$expire = 60 * 60 * 24;
			set_cookie("visitor", $data['browser'], $expire);
		}
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

?>
