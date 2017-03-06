<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data['error_message'] = $this->session->flashdata('error_message');

		$this->load->view("admin/login", $data);
	}

	public function process_login()
	{

		$this->load->model('Login_admin');
		$this->load->model('Model_user');

		// form validation
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

			$result = $this->Login_admin->login($data);

			if($result != FALSE)
			{
				$admin = $this->Model_user->select_by_id($result[0]->id_user)[0]->admin;

				$session_data = array(
					'id_user' => $result[0]->id_user,
					'username' => $result[0]->username,
					'admin' => $admin
				);

				$this->session->set_userdata('logged_in', $session_data);

				redirect('admin/Dashboard','refresh');
			}
			else
			{
				$message['invalid_user'] = 'invalid username or password';
				$this->session->set_flashdata('error_message', $message);
				redirect('/','refresh');
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
			redirect('/','refresh');
		}
	}

	public function process_logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('/','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */
?>
