<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
  {
    parent::__construct();
		$this->load->model('Model_log');
  }

	public function index()
	{
		$data['log'] = $this->Model_log->select_all()->result();
		$this->render['content'] = $this->load->view('admin/index', $data, TRUE);

		$this->render['title'] = "Dashboard";
		$this->render['desc'] = "Static Overview";
		$this->render['breadcrumb'] = array('Dashboard');
		$this->load->view('admin/template', $this->render);
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>
