<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends Admin_Controller {

	public function index()
	{
		$this->load->model('Model_log');

		$data['log'] = $this->Model_log->select_all()->result();
		$this->render['content'] = $this->load->view('admin/visitor/index', $data, TRUE);

		$this->render['title'] = "Visitor";
		$this->render['desc'] = "Detailed view of visitor traffic";
		$this->render['breadcrumb'] = array('Dashboard', 'Visitor');

		$this->load->view('admin/template', $this->render);
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>
