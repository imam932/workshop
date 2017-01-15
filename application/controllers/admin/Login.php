<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('login_admin');
	}

	public function index()
	{
		$data['error_message'] = $this->session->flashdata('error_message');
		$this->load->view('admin/login', $data);
	}

	public function process_login()
	{
		// form validation
		$this->form_validation->set_rules("username", "Username", "required|alpha_dash|xss_clean");
		$this->form_validation->set_rules("password", "Password", "required");

		if ($this->form_validation->run() == TRUE) 
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')) 
			);

			$result = $this->login_admin->login($data);

			if($result != FALSE)
			{
				$id_user = $result[0]->id_user;

				$session_data = array(
					'id_user' => $id_user,
					'username' => $this->input->post('username') 
				);

				// create session
				$this->session->set_userdata('logged_in', $session_data);

				// redirect to admin page
				redirect('admin/','refresh');
			}
			else
			{
				$message['invalid_user'] = 'invalid username or password'; 
				$this->session->set_flashdata('error_message', $message);
				redirect('admin/Login','refresh');
			}
		} 
		else 
		{
			$message = array();

			if(form_error('username') != "")
			{
				$message['username'] = form_error('username');
			}
			
			if(form_error('password') != "")
			{
				$message['password'] = form_error('password');
			}

			$this->session->set_flashdata('error_message', $message);
			redirect('admin/Login','refresh');
		}
	}

	public function process_logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('admin/Login','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */

?>