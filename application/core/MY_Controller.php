<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
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
		date_default_timezone_set('Asia/Jakarta');
		$data['ip'] = $this->input->server('REMOTE_ADDR');
		$data['ref'] = $this->input->server('HTTP_REFERER');
		$data['url'] = $this->input->server('REQUEST_URI');
		$data['date'] = date('Y-m-d H:i:s');
		$data['agent'] = $this->input->server('HTTP_USER_AGENT');

		// get Location
		$data['location'] = "unknown";
		$detail = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $data['ip'] ));

		if($detail->geoplugin_status == 200)
		{
			$country = $detail->geoplugin_countryName;
			$region = $detail->geoplugin_region;
			$city = $detail->geoplugin_city;
			$data['location'] = $country . "/" . $region . "/" . $city;
		}
		
		$this->Model_log->insert($data);
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

?>