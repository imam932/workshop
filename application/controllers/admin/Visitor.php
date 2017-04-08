<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends Admin_Controller {

	public function index()
	{
		$this->load->model(array('Model_message', 'Model_log', 'Model_privilege'));
		$data['log'] = $this->Model_log->select_all()->result();
		$data['content'] = $this->load->view('admin/visitor/index', $data, TRUE);

		$data['title'] = "Visitor";
		$data['desc'] = "Detailed view of visitor traffic";
		$data['breadcrumb'] = array('Dashboard', 'Visitor');
		$data['unread_message'] = $this->Model_message->unread_num();
    $data['message'] = $this->Model_message->select_all(3);
		$data['menu'] = $this->Model_privilege->select_all($this->session->userdata('logged_in')['id_level']);

		$this->load->view('admin/template', $data);
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>
