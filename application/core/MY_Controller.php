<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{

	protected $render = array();

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		// load model
		$this->load->model(['Model_privilege','Model_message']);

		// check login
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('admin/Login','refresh');
		}

		// check module
		if ($this->router->class != "Profile") {
			$privilege = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);
			$redirect = true;
			foreach ($privilege as $row) {
				if($this->router->class == $row->controller) {
					$redirect = false;
				}
			}

			if($redirect) {
				redirect('admin/','refresh');
			}
		}

		$this->render['unread_message'] = $this->Model_message->unread_num();
    $this->render['message'] = $this->Model_message->select_all(3);
		$this->render['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);
		$this->render['active_menu'] = $this->router->class;
	}

	public function save64Image($image64, $dir) {
		// get img string64
    $image64 = explode(',', $image64)[1];
    $data = base64_decode($image64);

    // get img extention
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $data, FILEINFO_MIME_TYPE);
    $extention = explode('/', $mime_type)[1];

    // save img to server
    $file = uniqid() . "." . $extention;
    file_put_contents($dir . $file, $data);

    return base_url($dir . $file);
	}
}

class User_Controller extends CI_Controller
{
	protected $render = array();

	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		// load model
		$this->load->model('Model_article');

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

		$this->render['article_footer']   = $this->Model_article->select_all(4);
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

?>
