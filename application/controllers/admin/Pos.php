<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

	public function index(){
		$data['title'] = "POS";
		$data['desc'] = "Create or Manage Articles";
		$data['content'] = $this->load->view('admin/pos', array(), TRUE);

		$this->load->view('admin/template', $data);
	}

	public function newpos(){
		$data['title'] = "NEW POS";
		$data['desc'] = "Create Your Articles";
		$data['content'] = $this->load->view('admin/pos_new', array(), TRUE);
		
		$this->load->view('admin/template', $data);
	}
}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */
?>
